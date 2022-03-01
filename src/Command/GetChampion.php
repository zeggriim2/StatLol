<?php

namespace App\Command;

use App\Entity\AllyTipChampion;
use App\Entity\Version;
use App\Entity\Champion;
use App\Entity\EnemyTipChampion;
use App\Entity\ImageChampion;
use App\Entity\ImagePassive;
use App\Entity\InfoChampion;
use App\Entity\ParTypeChampion;
use App\Entity\PassiveChampion;
use App\Entity\SkinChampion;
use App\Entity\StatChampion;
use App\Entity\TagChampion;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use App\Services\API\LOL\DataDragon\ChampionApi;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionImage as ChampionImageDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion as ChampionDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionPassive as ChampionPassiveDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionStat as ChampionStatDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionInfo as ChampionInfoDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionSkin as ChampionSkinDataDragon;

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

            for ($i = 0; $i < 1; $i++) {
                $championApi = $this->championApi->champion($idChampions[$i], $version->getName(), "fr_FR");
                $this->addChampionInBdd($championApi, $version);
            }
            // foreach ($idChampions as $idChampion) {
            //     $championApi = $this->championApi->champion($idChampion, $version->getName(), "fr_FR");
            //     dd($championApi);
            // }
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

        // TODO Passive
        if ($championApi->getPassive() !== null) {
            $championPassive = $this->buildPassiveChampion($championApi->getPassive());
            $champion->setPassive($championPassive);
        }

        // TODO Image
        if ($championApi->getImage() !== null) {
            $championImage = $this->buildImageChampion($championApi->getImage());
            $champion->setImage($championImage);
        }

        // TODO Info
        if ($championApi->getInfo() !== null) {
            $championInfo = $this->buildInfoChampion($championApi->getInfo());
            $champion->setInfoChampion($championInfo);
        }
/*
        // TODO Stats
        if ($championApi->getStats() !== null) {
            $championStat = $this->buildStatChampion($championApi->getStats());
            $champion->setStat($championStat);
        }

        // TODO SPELLS
        // TODO ParType
        $championParType = $this->buildParTypeChampion($championApi->getPartype());
        $champion->setParType($championParType);
        // TODO Tags

        $championTags = $this->buildTagsChampion($championApi->getTags());
        foreach($championTags as $championTag) {
            $champion->addTag($championTag);
        }
        // TODO Skins
        $championSkins = $this->buildSkinsChampion($championApi->getSkins());
        foreach($championSkins as $championSkin) {
            $champion->addSkin($championSkin);
        }

        // TODO EnemyTip
        $championEnemyTip = $this->buildEnemyTipChampion($championApi->getEnemytips());
        $champion->setEnemyTip($championEnemyTip);

        // TODO AllyTip
        $championAllyTip = $this->buildAllyChampion($championApi->getAllytips());
        $champion->setAllyTip($championAllyTip);
        */
        $em = $this->doctrine->getManager();
        $em->persist($champion);
        $em->flush();
        return true;
    }

    private function buildPassiveChampion(
        ChampionPassiveDataDragon $passiveChampionApi
    ): PassiveChampion {
        /**@var PassiveChampion|null $passiveChampion **/
        $passiveChampion = $this->doctrine->getRepository(PassiveChampion::class)
                                    ->findOneBy(
                                        [
                                            "name" => $passiveChampionApi->getName(),
                                            "description" => $passiveChampionApi->getDescription()
                                        ]
                                    );

        if (
            $passiveChampion === null ||
            strlen($passiveChampion->getDescription()) !== strlen($passiveChampionApi->getDescription())
        ) {
            $passiveChampion = (new PassiveChampion())
                ->setName($passiveChampionApi->getName())
                ->setDescription($passiveChampionApi->getDescription())
            ;
            $this->doctrine->getManager()->persist($passiveChampion);
        }


        $imagePassive = $this->doctrine->getRepository(ImagePassive::class)
                            ->findOneBy(["full" => $passiveChampionApi->getImage()->getFull()]);

        if ($imagePassive === null) {
            $imagePassive = (new ImagePassive())
                ->setFull($passiveChampionApi->getImage()->getFull())
                ->setSprite($passiveChampionApi->getImage()->getSprite())
                ->setGroupement($passiveChampionApi->getImage()->getGroup())
                ->setPosX($passiveChampionApi->getImage()->getX())
                ->setPosY($passiveChampionApi->getImage()->getY())
                ->setPosW($passiveChampionApi->getImage()->getW())
                ->setPosH($passiveChampionApi->getImage()->getH())
            ;
            $this->doctrine->getManager()->persist($imagePassive);
        }

        $passiveChampion->setImagePassive($imagePassive);

        $this->doctrine->getManager()->persist($passiveChampion);
        return $passiveChampion;
    }

    private function buildImageChampion(ChampionImageDataDragon $imageChampionApi): ImageChampion
    {
        $imageChampion = $this->doctrine->getRepository(ImageChampion::class)
                ->findOneBy(["full" => $imageChampionApi->getFull()]);
        
        if ($imageChampion === null) {
            $imageChampion = (new ImageChampion())
                ->setFull($imageChampionApi->getFull())
                ->setSprite($imageChampionApi->getSprite())
                ->setGroupement($imageChampionApi->getGroup())
                ->setPosX($imageChampionApi->getX())
                ->setPosY($imageChampionApi->getY())
                ->setPosW($imageChampionApi->getW())
                ->setPosH($imageChampionApi->getH())
            ;

            $this->doctrine->getManager()->persist($imageChampion);
        }

        return $imageChampion;
    }

    private function buildInfoChampion(ChampionInfoDataDragon $infoChampionApi): InfoChampion
    {
        $infoChampion = $this->doctrine->getRepository(InfoChampion::class)
                ->findOneBy(
                    [
                        "attack" => $infoChampionApi->getAttack(),
                        "defense" => $infoChampionApi->getDefense(),
                        "magic" => $infoChampionApi->getMagic(),
                        "difficulty" => $infoChampionApi->getDifficulty(),
                    ]
                );
        if($infoChampion === null) {
            $infoChampion = (new InfoChampion())
                ->setAttack($infoChampionApi->getAttack())
                ->setDefense($infoChampionApi->getDefense())
                ->setMagic($infoChampionApi->getMagic())
                ->setDifficulty($infoChampionApi->getDifficulty())
            ;

            $this->doctrine->getManager()->persist($infoChampion);
        }

        return $infoChampion;
    }

    private function buildStatChampion(ChampionStatDataDragon $statChampionApi): StatChampion
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
            ->setSpellBlock($statChampionApi->getSpellblock())
            ->setSpellBlockPerLevel($statChampionApi->getSpellblockperlevel())
        ;

        return $statChampion;
    }

    private function buildParTypeChampion(string $parTypeChampionApi): ParTypeChampion
    {
        $parTypeChampion = $this->doctrine->getRepository(ParTypeChampion::class)
                                    ->findOneBy(["name" => $parTypeChampionApi]);

        if ($parTypeChampion !== null) {
            return $parTypeChampion;
        }

        $parTypeChampion = (new ParTypeChampion())
            ->setName($parTypeChampionApi)
        ;

        return $parTypeChampion;
    }

    /**
     * @param array<string> $tagsChampionApi
     * @return TagChampion[]
     */
    private function buildTagsChampion(array $tagsChampionApi): array
    {
        $tagsChampion = [];
        foreach ($tagsChampionApi as $tagChampionApi) {
            $tagChampion = $this->doctrine->getRepository(TagChampion::class)->findOneBy(["label" => $tagChampionApi]);

            if ($tagChampion !== null) {
                $tagsChampion[] = $tagChampion;
                continue;
            }

            $tagChampion = (new TagChampion())
                ->setLabel($tagChampionApi)
            ;
            $tagsChampion[] = $tagChampion;
        }

        return $tagsChampion;
    }


    /**
     * @param ChampionSkin[] $skinsChampionApi
     * @return SkinChampion[]
     */
    private function buildSkinsChampion(array $skinsChampionApi): array
    {
        $skinsChampion = [];
        /** @var ChampionSkinDataDragon skinChampionApi **/
        foreach ($skinsChampionApi as $skinChampionApi) {
            $skinChampion = (new SkinChampion())
                ->setSkinId($skinChampionApi->getId())
                ->setNum($skinChampionApi->getNum())
                ->setName($skinChampionApi->getName())
                ->setChromas($skinChampionApi->getChromas())
            ;
            $this->doctrine->getManager()->persist($skinChampion);
            $skinsChampion[] = $skinChampion;
        }

        return $skinsChampion;
    }

    /**
     * @param array<string> $allyTipChampionApi
     */
    private function buildAllyChampion(array $allyTipChampionApi): AllyTipChampion
    {
        $allyTipChampion = (new AllyTipChampion())
            ->setAllyTip1($allyTipChampionApi[0])
            ->setAllyTip2($allyTipChampionApi[1])
            ->setAllyTip3($allyTipChampionApi[2])
        ;
        $this->doctrine->getManager()->persist($allyTipChampion);
        return $allyTipChampion;
    }

    /**
     * @param array<string> $enemyTipChampionApi
     */
    private function buildEnemyTipChampion(array $enemyTipChampionApi): EnemyTipChampion
    {
        $enemyTipChampion = (new EnemyTipChampion())
            ->setEnemyTip1($enemyTipChampionApi[0])
            ->setEnemyTip2($enemyTipChampionApi[1])
            ->setEnemyTip3($enemyTipChampionApi[2])
        ;
        $this->doctrine->getManager()->persist($enemyTipChampion);
        return $enemyTipChampion;
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
