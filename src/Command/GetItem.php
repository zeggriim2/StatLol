<?php

namespace App\Command;

use App\Entity\GoldItem;
use App\Entity\ImageItem;
use App\Entity\Item;
use App\Entity\StatItem;
use App\Entity\TagItem;
use App\Entity\Version;
use App\Repository\VersionRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Services\API\LOL\DataDragon\ItemApi;
use App\Services\API\LOL\Model\DataDragon\Commun\Image;
use Symfony\Component\Console\Command\Command;
use App\Services\API\LOL\Model\DataDragon\Item as DataDragonItem;
use App\Services\API\LOL\Model\DataDragon\Item\ItemGold;
use App\Services\API\LOL\Model\DataDragon\Item\ItemStat;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetItem extends Command
{
    private ManagerRegistry $doctrine;
    private ItemApi $itemApi;

    /**
     * @var string|null
     */
    protected static $defaultName = "app:GetItem";
    protected function configure(): void
    {
        $this
            ->setHelp("Intègre en bdd les informations de l'Item");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        // On récupère tout les versions
        /** @var VersionRepository $versionRepo **/
        $versionRepo = $this->doctrine->getRepository(Version::class);
        $versions = $versionRepo->getVersionWithoutLolPatch();

        foreach ($versions as $version) {
            $items = $this->itemApi->items($version->getName(), "fr_FR");
            foreach($items as $item) {
                $this->addItemInBdd($item, $version);
            }
        }

        return Command::SUCCESS;
    }

    private function addItemInBdd(DataDragonItem $itemApi, Version $version) {
        $item = (new Item)
            ->setName($itemApi->getName())
            ->setDescription($itemApi->getDescription())
            ->setColloq($itemApi->getColloq())
            ->setPlaintext($itemApi->getPlaintext())
            ->setItemId($itemApi->getId())
            ->setVersion($version)
        ;

        // TODO Image
        if($itemApi->getImage() !== null) {
            $itemImage = $this->buildImageItem($itemApi->getImage());
            $item->setImage($itemImage);
        }

        // TODO Gold
        if($itemApi->getGold() !== null) {
            $itemGold = $this->buildGoldItem($itemApi->getGold());
            $item->setGold($itemGold);
        }

        //TODO Stat
        if($itemApi->getStats() !== null) {
            $itemStat = $this->buildStatItem($itemApi->getStats());
            $item->setStat($itemStat);
        }

        //TODO Tag
        $itemTags = $this->buildTagsItem($itemApi->getTags());
        foreach($itemTags as $itemTag) {
        }

        // TODO Maps

        // TODO From

    }

    private function buildImageItem(Image $imageItemApi) {
        $imageItem = $this->doctrine->getRepository(ImageItem::class)
                ->findOneBy(["full" => $imageItemApi->getFull()]);

        if ($imageItem === null) {
            $imageItem = (new ImageItem())
                ->setFull($imageItemApi->getFull())
                ->setSprite($imageItemApi->getSprite())
                ->setGroupement($imageItemApi->getGroup())
                ->setPosX($imageItemApi->getX())
                ->setPosY($imageItemApi->getY())
                ->setPosW($imageItemApi->getW())
                ->setPosH($imageItemApi->getH())
            ;

            $this->doctrine->getManager()->persist($imageItem);
        }
        return $imageItem;
    }

    private function buildGoldItem(ItemGold $goldItemApi) {
        $goldItem = (new GoldItem())
            ->setBase($goldItemApi->getBase())
            ->setPurchasable($goldItemApi->getPurchasable())
            ->setTotal($goldItemApi->getTotal())
            ->setSell($goldItemApi->getSell())
        ;

        $this->doctrine->getManager()->persist($goldItem);

        return $goldItem;
    }

    private function buildStatItem(ItemStat $statItemApi) {
        $statItem = (new StatItem)
            ->setPercentAttackSpellMod($statItemApi->getPercentAttackSpeedMod())
            ->setFlatHPPoolMod($statItemApi->getFlatHPPoolMod())
            ->setFlatCritChanceMod($statItemApi->getFlatCritChanceMod())
            ->setFlatMagicDamageMod($statItemApi->getFlatMagicDamageMod())
            ->setFlatMPPoolMod($statItemApi->getFlatMPPoolMod())
            ->setFlatArmorMod($statItemApi->getFlatArmorMod())
            ->setFlatSpellBlockMod($statItemApi->getFlatSpellBlockMod())
            ->setFlatPhysicalDamageMod($statItemApi->getFlatPhysicalDamageMod())
            ->setFlatMovemenentSpeedMod($statItemApi->getFlatMovementSpeedMod())
            ->setPercentLifeStealMod($statItemApi->getPercentLifeStealMod())
            ->setFlatHPRegenMod($statItemApi->getFlatHPRegenMod())
            ->setPercentMovementSpeedMod($statItemApi->getPercentMovementSpeedMod())
        ;

        $this->doctrine->getManager()->persist($statItem);
        return $statItem;
    }

    private function buildTagsItem(array $tagsItemApi) {
        $tagsItem = [];
        foreach($tagsItemApi as $tagItemApi) {
            $tagItem = $this->doctrine->getRepository(TagChampion::class)->findOneBy(["label" => $tagItemApi]);

            if ($tagItem !== null) {
                $tagsChampion[] = $tagItem;
                continue;
            }

            $tagChampion = (new TagItem())
                ->setLabel($tagItemApi)
            ;

            $this->doctrine->getManager()->persist($tagChampion);
            $tagsChampion[] = $tagChampion;
        }
        return $tagsItem;
    }


    public function __construct(
        ManagerRegistry $doctrine,
        ItemApi $itemApi
    ) {
        $this->doctrine = $doctrine;
        $this->itemApi = $itemApi;
        parent::__construct();
    }
}
