<?php

namespace App\Command;

use App\Entity\Champion;
use App\Entity\Image;
use App\Entity\InfoChampion;
use App\Entity\PartType;
use App\Entity\StatChampion;
use App\Entity\Version;
use App\Services\API\LOL\DataDragon\ChampionApi;
use App\Services\API\LOL\DataDragon\GeneralApi;
use App\Services\API\LOL\Model\DataDragon\Champion as ModelChampionApi;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GetChampions extends Command
{
    private ManagerRegistry $doctrine;
    private ChampionApi $championApi;
    private GeneralApi $generalApi;
    private ObjectManager $em;

    /**
     * @var string|null
     */
    protected static $defaultName = "app:GetChampions";
    protected function configure(): void
    {
        $this
            ->addArgument(
                "version",
                InputArgument::OPTIONAL,
                "On récupère les infos avec une certaine version",
                null
            )
            ->setDescription("Récupère tous les Champions et les intègrent en BDD.")
            ->setHelp("Intègre en bdd les tous les Champions");
    }


    public function __construct(
        ManagerRegistry $doctrine,
        ChampionApi $championApi,
        GeneralApi $generalApi
    ) {
        $this->doctrine = $doctrine;
        $this->championApi = $championApi;
        $this->generalApi = $generalApi;
        $this->em = $doctrine->getManager();
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $versionInput = $input->getArgument("version");
        //Check si la version est existe bien
        $checkVersion = null;
        if ($versionInput !== null) {
            $checkVersion = $this->generalApi->checkVersion($versionInput);
        } else {
            $versions = $this->doctrine->getRepository(Version::class)->findAll();
            foreach ($versions as $version) {
                $championsApi = $this->championApi->champions($version->getName(), "fr_FR");
                foreach ($championsApi as $championApi) {
                    if (
                        $this->doctrine
                            ->getRepository(Champion::class)
                            ->findOneBy([
                                "idChampion" => $championApi->getId(),
                                "version" => $version
                            ]) === null
                    ) {
                        $infoChampion = $this->instanceInfoChampion($championApi);
                        $image = $this->instanceImage($championApi);
                        $statChampion = $this->instanceStatChampion($championApi);

                        $partType = $this->doctrine
                            ->getRepository(PartType::class)
                            ->findOneBy(['label' => $championApi->getPartype()])
                        ;

                        if ($partType === null) {
                            $partType = $this->instancePartType($championApi);
                        }

                        $champion = (new Champion())
                            ->setName($championApi->getName())
                            ->setCle($championApi->getKey())
                            ->setIdChampion($championApi->getId())
                            ->setTitle($championApi->getTitle())
                            ->setBlurb($championApi->getBlurb())
                            ->setImage($image)
                            ->setInfoChampion($infoChampion)
                            ->setStat($statChampion)
                            ->setPartType($partType)
                            ->setVersion($version)
                        ;

                        $this->em->persist($champion);
                        $this->em->flush();
                    }
                }
            }
        }
//            $io->error("Erreur aucune verions n'a été trouvé !!!"); // TODO
//            return Command::FAILURE;
//        $io->success("$nbVersionAdd version(s) ont été ajouté en BDD");
        return Command::SUCCESS;
    }

    private function instanceInfoChampion(ModelChampionApi $championApi): InfoChampion
    {
        $infoChampion = (new InfoChampion())
            ->setAttack($championApi->getInfo()->getAttack())
            ->setDefense($championApi->getInfo()->getDefense())
            ->setMagic($championApi->getInfo()->getMagic())
            ->setDifficulty($championApi->getInfo()->getDifficulty())
        ;
        $this->em->persist($infoChampion);
        return $infoChampion;
    }

    private function instanceImage(ModelChampionApi $championApi): Image
    {
        $image = (new Image())
            ->setFull($championApi->getImage()->getFull())
            ->setSprite($championApi->getImage()->getSprite())
            ->setCategorie($championApi->getImage()->getGroup())
            ->setPosX($championApi->getImage()->getX())
            ->setPosY($championApi->getImage()->getY())
            ->setPosW($championApi->getImage()->getW())
            ->setPosH($championApi->getImage()->getH())
        ;
        $this->em->persist($image);
        return $image;
    }

    private function instancePartType(ModelChampionApi $championApi): PartType
    {
        $partType = (new PartType())
            ->setLabel($championApi->getPartype())
        ;
        $this->em->persist($partType);
        return $partType;
    }

    private function instanceStatChampion(ModelChampionApi $championApi): StatChampion
    {
        $statChampion = (new StatChampion())
            ->setArmor($championApi->getStats()->getArmor())
            ->setArmorPerLevel($championApi->getStats()->getArmorperlevel())
            ->setAttackDamage($championApi->getStats()->getAttackDamage())
            ->setAttackDamagePerLevel($championApi->getStats()->getAttackDamagePerlevel())
            ->setAttackRange($championApi->getStats()->getAttackrange())
            ->setAttackSpeed($championApi->getStats()->getattackspeed())
            ->setAttackSpeedPerLevel($championApi->getStats()->getAttackSpeedPerlevel())
            ->setCrit($championApi->getStats()->getCrit())
            ->setCritPerLevel($championApi->getStats()->getCritperlevel())
            ->setHp($championApi->getStats()->getHp())
            ->setHpPerLevel($championApi->getStats()->getHpperlevel())
            ->setHpRegen($championApi->getStats()->getHpregen())
            ->setHpRegenPerLevel($championApi->getStats()->getHpregenperlevel())
            ->setMoveSpeed($championApi->getStats()->getMovespeed())
            ->setMp($championApi->getStats()->getMp())
            ->setMpPerLevel($championApi->getStats()->getMpperlevel())
            ->setMpRegen($championApi->getStats()->getMpregen())
            ->setMpRegenPerLevel($championApi->getStats()->getMpregenperlevel())
            ->setSpellBlock($championApi->getStats()->getSpellblock())
            ->setSpellBlockPerLevel($championApi->getStats()->getSpellblockperlevel())
        ;

        $this->em->persist($statChampion);
        return $statChampion;
    }
}
