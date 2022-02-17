<?php

namespace App\Command;

use App\Entity\Version;
use App\Entity\Champion;
use App\Entity\ImageChampion;
use App\Entity\ImagePassive;
use App\Entity\PassiveChampion;
use App\Entity\StatChampion;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use App\Services\API\LOL\DataDragon\ChampionApi;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionImage;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionPassive as ChampionPassiveDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion as ChampionDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionStat as ChampionStatDataDragon;

class GetChampion extends Command
{
    private ManagerRegistry $doctrine;
    private ChampionApi $championApi;

    /**
     * @var string|null
     */
    protected static $defaultName = "app:GetChampion";
    protected function configure(): void
    {
        $this
            // ->addArgument("nameSummoner", InputArgument::REQUIRED, "Nom d'invocateur sur League Of Legends")
            ->setHelp("Intègre en bdd les informations du champion");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        // On récupère tout les versions
        $versionRepo = $this->doctrine->getRepository(Version::class);
        /** @var Version[] $versions **/
        $versions = $versionRepo->getVersionWithoutLolPatch();

        foreach ($versions as $version) {
            $champions = $this->championApi->champions($version->getName(), "fr_FR");
            $idChampions = array_map(function ($champion) {
                return $champion->getId();
            }, $champions);

            foreach ($idChampions as $idChampion) {
                $championApi = $this->championApi->champion($idChampion, $version->getName(), "fr_FR");
                dd($championApi);
            }
        }



        return Command::SUCCESS;
    }

    private function addChampionInBdd(ChampionDataDragon $championApi, Version $version)
    {
        $champion = (new Champion())
            ->setName($championApi->getName())
            ->setIdChampion($championApi->getId())
            ->setCle($championApi->getKey())
            ->setTitle($championApi->getTitle())
            ->setBlurb($championApi->getBlurb())
            ->setLore($championApi->getLore())
            ->setVersion($version)
        ;

        if ($championApi->getPassive() !== null) {
            $championPassive = $this->buildPassiveChampion($championApi->getPassive());
        }

        $championImage = (new ImageChampion())
            ->setFull($championApi->getImage()->getFull())
            ->setSprite($championApi->getImage()->getSprite())
            ->setGroupement($championApi->getImage()->getGroup())
            ->setPosX($championApi->getImage()->getX())
            ->setPosY($championApi->getImage()->getY())
            ->setPosW($championApi->getImage()->getW())
            ->setPosH($championApi->getImage()->getH())
        ;
    }

    private function buildPassiveChampion(ChampionPassiveDataDragon $passiveChampionApi): PassiveChampion
    {
        $passiveChampion = (new PassiveChampion())
            ->setName($passiveChampionApi->getName())
            ->setDescription($passiveChampionApi->getDescription())
        ;
        $imagePassive = (new ImagePassive())
            ->setFull($passiveChampionApi->getImage()->getFull())
            ->setSprite($passiveChampionApi->getImage()->getSprite())
            ->setGroupement($passiveChampionApi->getImage()->getGroup())
            ->setPosX($passiveChampionApi->getImage()->getX())
            ->setPosY($passiveChampionApi->getImage()->getY())
            ->setPosW($passiveChampionApi->getImage()->getW())
            ->setPosH($passiveChampionApi->getImage()->getH())
        ;

        $passiveChampion->setImagePassive($imagePassive);
        return $passiveChampion;
    }

    private function buildStatChampion(ChampionStatDataDragon $statChampionApi)
    {
        $statChampion = (new StatChampion())
            ->setArmor($statChampionApi->getArmor())
            ->setArmorPerLevel($statChampionApi->getArmorperlevel())
            ->setAttackDamage($statChampionApi->getAttackDamage())
            ->setAttackDamagePerLevel($statChampionApi->getAttackDamagePerlevel())
            ->setAttackRange($statChampionApi->getAttackrange())
            ->setAttackSpeed($statChampionApi->getattackspeed())
            ->setAttackSpeedPerlevel($statChampionApi->getAttackSpeedPerlevel())
            ->setCrit($statChampionApi->getCrit())
            ->setCritPerLevel($statChampionApi->getCritperlevel())
            ->setHp($statChampionApi->getHp())
            ->setHpPerLevel($statChampionApi->getHpperlevel())
            ->setHpRegen($statChampionApi->getHpregen())
            ->setHpRegenPerLevel($statChampionApi->getHpregenperlevel())
            ->setMp($statChampionApi->getMp())
            ->setMpPerLevel($statChampionApi->getMpregenperlevel())
            ->setMpRegen($statChampionApi->getMpregen())
            ->setMpRegenPerLevel($statChampionApi->getMpregenperlevel())
            ->setMoveSpeed($statChampionApi->getMovespeed())
        ;
    }

    public function __construct(
        ManagerRegistry $doctrine,
        ChampionApi $championApi
    ) {
        $this->doctrine = $doctrine;
        $this->championApi = $championApi;
        parent::__construct();
    }
}
