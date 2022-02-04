<?php

namespace App\Controller;

use App\Form\SummonerType;
use App\Services\API\LOL\SummonerApi;
use App\Services\API\LOL\Model\Summoner as EnitySummonerApi;
use App\Entity\Summoner;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class SummonerController extends AbstractController
{
    private KernelInterface $kernel;
    private SummonerApi $summonerApi;
    private ManagerRegistry $doctrine;

    public function __construct(
        KernelInterface $kernel,
        SummonerApi $summonerApi,
        ManagerRegistry $doctrine
    )
    {
        $this->kernel = $kernel;
        $this->summonerApi = $summonerApi;
        $this->doctrine = $doctrine;
    }


    /**
     * @Route("/summoner", name="summoner_index")
     */
    public function index(
        Request $request
    ): Response
    {

        $form = $this->createForm(SummonerType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nameSummoner = $form->get('name')->getData();
            $summonerApi = $this->summonerApi->summonerBySummonerName($nameSummoner);
            if($summonerApi !== null) {
                // On intègre le Summoner en BDD
                $this->addSummonrInBdd($summonerApi);

                return $this->redirectToRoute("summoner_name",["name" => $nameSummoner]);
            }
            $this->addFlash("summonerError","Nom d'invocateur non trouvé !!!");
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
    )
    {
        
    }



    private function addSummonrInBdd(EnitySummonerApi $summonerApi)
    {
        $summoner = $this->doctrine->getRepository(EntitySummoner::class)->findOneBy(['summonerId' => $summonerApi->getId()]);
        if($summoner === null) {
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
