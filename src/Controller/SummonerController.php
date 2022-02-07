<?php

namespace App\Controller;

use App\Entity\Tier;
use App\Entity\Queue;
use App\Entity\League;
use App\Entity\Division;
use App\Entity\Summoner;
use App\Form\SummonerType;
use App\Services\API\LOL\LeagueApi;
use App\Repository\LeagueRepository;
use App\Services\API\LOL\SummonerApi;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\API\LOL\Model\League as EntityLeagueApi;
use App\Services\API\LOL\Model\Config\Queue as QueueConfig;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Services\API\LOL\Model\Summoner as EntitySummonerApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SummonerController extends AbstractController
{
    private ManagerRegistry $doctrine;
    private SummonerApi $summonerApi;
    private LeagueApi $leagueApi;
    private ObjectManager $em;


    public function __construct(
        ManagerRegistry $doctrine,
        SummonerApi $summonerApi,
        LeagueApi $leagueApi
    ) {
        $this->doctrine = $doctrine;
        $this->summonerApi = $summonerApi;
        $this->leagueApi = $leagueApi;
        $this->em = $doctrine->getManager();
    }


    /**
     * @Route("/summoner", name="summoner_index")
     */
    public function index(
        Request $request
    ): Response {

        $form = $this->createForm(SummonerType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nameSummoner = $form->get('name')->getData();

            $summonerApi = $this->checkSummonerApi($nameSummoner);

            if ($summonerApi !== null) {
                // On intègre le Summoner en BDD
                $this->addSummonerInBdd($summonerApi);

                $summoner = $this->doctrine->getRepository(Summoner::class)
                                ->findOneBy(['summonerId' => $summonerApi->getId()]);

                $this->addLeagueInBdd($summoner);

                return $this->redirectToRoute("summoner_name", ["name" => $nameSummoner]);
            }
            $this->addFlash("summonerError", "Nom d'invocateur non trouvé !!!");
        }

        return $this->render('summoner/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'SummonerController',
        ]);
    }


    /**
     * @Route("/summoner/{name}", name="summoner_name")
     */
    public function name(
        Summoner $summoner
    ): Response {
        return $this->render('summoner/name.html.twig', [
            'summoner' => $summoner
        ]);
    }


    private function checkSummonerApi(string $nameSummoner): ?EntitySummonerApi
    {
        return $this->summonerApi->summonerBySummonerName($nameSummoner);
    }


    private function addLeagueInBdd(Summoner $summoner = null): void
    {
        // On récupère les league d'un summoner
        $leaguesApi = $this->leagueApi->leagueBySummonerId($summoner->getSummonerId());

        // On filtre que les leagues correspondant à League of legends (on exclus TFT par Exemple)
        $this->filtreLeagueQueue($leaguesApi);

        /** @var LeagueRepository $leagueRepo */
        $leagueRepo = $this->doctrine->getRepository(League::class);

        /** @var EntityLeagueApi $leagueApi */
        foreach ($leaguesApi as $leagueApi) {

            /** @var Queue $queue */
            $queue = $this->doctrine->getRepository(Queue::class)->findOneBy(['name' => $leagueApi->getQueueType()]);
            /** @var Tier $tier */
            $tier = $this->doctrine->getRepository(Tier::class)->findOneBy(['name' => $leagueApi->getTier()]);
            /** @var Division $division */
            $division = $this->doctrine->getRepository(Division::class)->findOneBy(['name' => $leagueApi->getRank()]);

            $league = $leagueRepo->findOneBy(
                [
                    'queue' => $queue,
                     "summoner" => $summoner,
                      "active" => true
                ],
                [
                    "createdAt" => "DESC"
                ]
            );

            if ($league !== null) {
                $dateLimit = (new \DateTimeImmutable())->modify("-2 minutes");
                if ($league->getCreatedAt() >= $dateLimit) {
                    continue;
                } else {
                    $this->desactiveLeague($league);
                }
            }

            $league = (new League())
                ->setQueue($queue)
                ->setTier($tier)
                ->setDivision($division)
                ->setLeagueId($leagueApi->getLeagueId())
                ->setSummoner($summoner)
                ->setLeaguePoints($leagueApi->getLeaguePoints())
                ->setWins($leagueApi->getWins())
                ->setLosses($leagueApi->getLosses())
                ->setVeteran($leagueApi->isVeteran())
                ->setInactive($leagueApi->isInactive())
                ->setFreshBlood($leagueApi->isFreshBlood())
                ->setHotStreak($leagueApi->isHotStreak())
            ;
            $this->em->persist($league);
        }

        $this->em->persist($summoner);
        $this->em->flush();
    }


    /**
     * @param array<array-key,EntityLeagueApi> $leaguesApi
     */
    private function filtreLeagueQueue(array &$leaguesApi): void
    {
        foreach ($leaguesApi as $key => $league) {
            if (!in_array($league->getQueueType(), QueueConfig::ALL_QEUEUES)) {
                unset($leaguesApi[$key]);
            }
        }
    }

    private function desactiveLeague(league $league): void
    {
        $league->setActive(false);
        $this->em->persist($league);
        $this->em->flush();
    }

    private function addSummonerInBdd(EntitySummonerApi $summonerApi): void
    {
        $summoner = $this->doctrine->getRepository(Summoner::class)->findOneBy(['summonerId' => $summonerApi->getId()]);

        if ($summoner === null) {
            $summoner = new Summoner();
        }

        $summoner
            ->setSummonerId($summonerApi->getId())
            ->setAccountId($summonerApi->getAccountId())
            ->setName($summonerApi->getName())
            ->setProfileIconId($summonerApi->getProfileIconId())
            ->setPuuid($summonerApi->getPuuid())
        ;
        $em = $this->doctrine->getManager();

        $em->persist($summoner);
        $em->flush();
    }
}
