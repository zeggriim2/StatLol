<?php

namespace App\Command;

use App\Entity\Spell;
use App\Entity\Version;
use App\Entity\Champion;
use App\Entity\CostSpell;
use App\Entity\ImageSpell;
use App\Entity\RangeSpell;
use App\Entity\TagChampion;
use App\Entity\ImagePassive;
use App\Entity\InfoChampion;
use App\Entity\SkinChampion;
use App\Entity\StatChampion;
use App\Entity\CoolDownSpell;
use App\Entity\ImageChampion;
use App\Entity\LevelTipSpell;
use App\Entity\AllyTipChampion;
use App\Entity\ParTypeChampion;
use App\Entity\PassiveChampion;
use App\Entity\EnemyTipChampion;
use App\Repository\VersionRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use App\Services\API\LOL\DataDragon\ChampionApi;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\API\LOL\Model\DataDragon\Commun\Image;
use App\Services\API\LOL\Model\DataDragon\Champion as ChampionDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionSpellLevelTip;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionInfo as ChampionInfoDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionSkin as ChampionSkinDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionStat as ChampionStatDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionImage as ChampionImageDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionSpell as ChampionSpellDataDragon;
use App\Services\API\LOL\Model\DataDragon\Champion\ChampionPassive as ChampionPassiveDataDragon;

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
        /** @var VersionRepository $versionRepo **/
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

    private function addChampionInBdd(ChampionDataDragon $championApi, Version $version): bool
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

        // TODO ParType
        if ($championApi->getPartype() !== null) {
            $championParType = $this->buildParTypeChampion($championApi->getPartype());
            $champion->setParType($championParType);
        }

        // TODO Stats
        if ($championApi->getStats() !== null) {
            $championStat = $this->buildStatChampion($championApi->getStats());
            $champion->setStat($championStat);
        }

        // TODO Tags
        $championTags = $this->buildTagsChampion($championApi->getTags());
        foreach ($championTags as $championTag) {
            $champion->addTag($championTag);
        }

        // TODO Skins
        $championSkins = $this->buildSkinsChampion($championApi->getSkins());
        foreach ($championSkins as $championSkin) {
            $champion->addSkin($championSkin);
        }

        // TODO EnemyTip
        $championEnemyTip = $this->buildEnemyTipChampion($championApi->getEnemytips());
        $champion->setEnemyTip($championEnemyTip);

        // TODO AllyTip
        $championAllyTip = $this->buildAllyTipChampion($championApi->getAllytips());
        $champion->setAllyTip($championAllyTip);

        // TODO SPELLS
        $championSpells = $this->buildSpellsChampion($championApi->getSpells());
        foreach ($championSpells as $championSpell) {
            $champion->addSpell($championSpell);
        }


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
        if ($infoChampion === null) {
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

        $this->doctrine->getManager()->persist($parTypeChampion);

        return $parTypeChampion;
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

        $this->doctrine->getManager()->persist($statChampion);

        return $statChampion;
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

            $this->doctrine->getManager()->persist($tagChampion);
            $tagsChampion[] = $tagChampion;
        }

        return $tagsChampion;
    }


    /**
     * @param array<ChampionSkinDataDragon> $skinsChampionApi
     * @return SkinChampion[] $skinsChampion
     */
    private function buildSkinsChampion(array $skinsChampionApi): array
    {
        $skinsChampion = [];
        /** @var ChampionSkinDataDragon $skinChampionApi **/
        foreach ($skinsChampionApi as $skinChampionApi) {
            $skinChampion = $this->doctrine->getRepository(SkinChampion::class)
                ->findOneBy([
                    "skinId" => $skinChampionApi->getId(),
                    "name" => $skinChampionApi->getName()
                ]);

            if ($skinChampion === null) {
                $skinChampion = (new SkinChampion())
                    ->setSkinId($skinChampionApi->getId())
                    ->setNum($skinChampionApi->getNum())
                    ->setName($skinChampionApi->getName())
                    ->setChromas($skinChampionApi->getChromas())
                ;
                $this->doctrine->getManager()->persist($skinChampion);
            }

            $skinsChampion[] = $skinChampion;
        }

        return $skinsChampion;
    }

    /**
     * @param array<string> $enemyTipsChampionApi
     */
    private function buildEnemyTipChampion(array $enemyTipsChampionApi): EnemyTipChampion
    {
        /** @var EnemyTipChampion|null $enemyTipChampion **/
        $enemyTipChampion = $this->doctrine->getRepository(EnemyTipChampion::class)
                        ->findOneBy([
                            "enemyTip1" => $enemyTipsChampionApi[0],
                        ]);
        if (
            $enemyTipChampion === null ||
            (
                strlen($enemyTipChampion->getEnemyTip1()) !== strlen($enemyTipsChampionApi[0]) &&
                strlen($enemyTipChampion->getEnemyTip2()) !== strlen($enemyTipsChampionApi[1]) &&
                strlen($enemyTipChampion->getEnemyTip3()) !== strlen($enemyTipsChampionApi[2])
            )
        ) {
            $enemyTipChampion = new EnemyTipChampion();

            for ($i = 0; $i < count($enemyTipsChampionApi); $i++) {
                $method = "setEnemyTip" . ($i + 1);
                $enemyTipChampion->$method($enemyTipsChampionApi[$i]);
            }
            $this->doctrine->getManager()->persist($enemyTipChampion);
        }

        return $enemyTipChampion;
    }

    /**
     * @param array<string> $allyTipChampionApi
     */
    private function buildAllyTipChampion(array $allyTipChampionApi): AllyTipChampion
    {
        /**@var AllyTipChampion|null $allyTipChampion **/
        $allyTipChampion = $this->doctrine->getRepository(AllyTipChampion::class)
                    ->findOneBy([
                        "allyTip1" => $allyTipChampionApi[0]
                    ]);

        if (
            $allyTipChampion === null ||
            (
                strlen($allyTipChampion->getAllyTip1()) !== strlen($allyTipChampionApi[0]) &&
                strlen($allyTipChampion->getAllyTip2()) !== strlen($allyTipChampionApi[1]) &&
                strlen($allyTipChampion->getAllyTip3()) !== strlen($allyTipChampionApi[3])
            )
        ) {
            $allyTipChampion = new AllyTipChampion();

            for ($i = 0; $i < count($allyTipChampionApi); $i++) {
                $method = "setAllyTip" . ($i + 1);
                $allyTipChampion->$method($allyTipChampionApi[$i]);
            }
            $this->doctrine->getManager()->persist($allyTipChampion);
        }
        return $allyTipChampion;
    }

    /**
     * @param array<ChampionSpellDataDragon> $spellsChampionApi
     * @return array<Spell> $spellsChampion
     */
    private function buildSpellsChampion(array $spellsChampionApi): array
    {

        $spellsChampion = [];
        /** @var ChampionSpellDataDragon $spellChampionApi */
        foreach ($spellsChampionApi as $spellChampionApi) {
            $spellChampion = (new Spell())
                ->setIdSpell($spellChampionApi->getId())
                ->setName($spellChampionApi->getName())
                ->setDescription($spellChampionApi->getDescription())
                ->setTooltip($spellChampionApi->getTooltip())
                ->setMaxrank($spellChampionApi->getMaxrank())
                ->setCoolDownBurn($spellChampionApi->getCooldownBurn())
                ->setCostBurn($spellChampionApi->getCostBurn())
                ->setEffect($spellChampionApi->getEffect())
                ->setEffectBurn($spellChampionApi->getEffectBurn())
                ->setCostType($spellChampionApi->getCostType())
                ->setMaxammo($spellChampionApi->getMaxammo())
                ->setRangeBurn($spellChampionApi->getRangeBurn())
                ->setResource($spellChampionApi->getResource())
            ;

            $coolDownSpellChampion = $this->buildCoolDownSpellChampion($spellChampionApi->getCooldown());
            $spellChampion->setCoolDown($coolDownSpellChampion);

            $levelTipSpellChampion = $this->buildLevelTipSpellChampion($spellChampionApi->getLeveltip());
            $spellChampion->setLevelTip($levelTipSpellChampion);

            $costSpellChampion = $this->buildCostSpellChampion($spellChampionApi->getCost());
            $spellChampion->setCost($costSpellChampion);


            $rangeSpellChampion = $this->buildRangeSpellChampion($spellChampionApi->getRange());
            $spellChampion->setRangeSpell($rangeSpellChampion);

            $imageSpellChampion = $this->buildImageSpellChampion($spellChampionApi->getImage());
            $spellChampion->setImage($imageSpellChampion);

            $this->doctrine->getManager()->persist($spellChampion);
            $spellsChampion[] = $spellChampion;
        }
        return $spellsChampion;
    }

    /**
     * @param array<int> $coolDown
     */
    private function buildCoolDownSpellChampion(array $coolDown): CoolDownSpell
    {
        $coolDownSpellChampion = new CoolDownSpell();
        for ($i = 0; $i < count($coolDown); $i++) {
            $method = "setLevel" . ($i + 1);
            $coolDownSpellChampion->$method($coolDown[$i]);
        }
        $this->doctrine->getManager()->persist($coolDownSpellChampion);
        return $coolDownSpellChampion;
    }

    private function buildLevelTipSpellChampion(ChampionSpellLevelTip $levelTip): LevelTipSpell
    {
        $levelTipSpellChampion = (new LevelTipSpell())
            ->setLabel($levelTip->getLabel())
            ->setEffect($levelTip->getEffect())
        ;

        $this->doctrine->getManager()->persist($levelTipSpellChampion);
        return $levelTipSpellChampion;
    }

    /**
     * @param array<int> $cost
     */
    private function buildCostSpellChampion(array $cost): CostSpell
    {
        $costSpellChampion = new CostSpell();
        for ($i = 0; $i < count($cost); $i++) {
            $method = "setLevel" . ($i + 1);
            $costSpellChampion->$method($cost[$i]);
        }
        $this->doctrine->getManager()->persist($costSpellChampion);
        return $costSpellChampion;
    }

    /**
     * @param array<int>|string $range
     * @return RangeSpell
     */
    private function buildRangeSpellChampion($range): RangeSpell
    {
        $rangeSpellChampion = new RangeSpell();
        if (is_array($range)) {
            for ($i = 0; $i < count($range); $i++) {
                $method = "setLevel" . ($i + 1);
                $rangeSpellChampion->$method($range[$i]);
            }
        } else {
            $rangeSpellChampion->setLevel1(0);
        }

        $this->doctrine->getManager()->persist($rangeSpellChampion);
        return $rangeSpellChampion;
    }

    private function buildImageSpellChampion(Image $imageSpellApi): ImageSpell
    {
        /**@var ImageSpell|null $imageSpellChampion **/
        $imageSpellChampion = $this->doctrine->getRepository(ImageSpell::class)
                ->findOneBy(["full" => $imageSpellApi->getFull()]);

        if (
            $imageSpellChampion === null ||
            $imageSpellChampion->getPosX() !== $imageSpellApi->getX() ||
            $imageSpellChampion->getPosY() !== $imageSpellApi->getY() ||
            $imageSpellChampion->getPosW() !== $imageSpellApi->getW() ||
            $imageSpellChampion->getPosH() !== $imageSpellApi->getH()
        ) {
            $imageSpellChampion = (new ImageSpell())
                ->setFull($imageSpellApi->getFull())
                ->setSprite($imageSpellApi->getSprite())
                ->setGroupement($imageSpellApi->getGroup())
                ->setPosX($imageSpellApi->getX())
                ->setPosY($imageSpellApi->getY())
                ->setPosW($imageSpellApi->getW())
                ->setPosH($imageSpellApi->getH())
            ;
        }

        $this->doctrine->getManager()->persist($imageSpellChampion);
        return $imageSpellChampion;
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
