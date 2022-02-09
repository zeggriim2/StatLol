<?php

namespace App\Services\API\LOL\Model\DataDragon\Item;

class ItemStat
{
    private ?float $percentAttackSpeedMod;
    private ?int $flatHPPoolMod;
    private ?float $flatCritChanceMod;
    private ?int $flatMagicDamageMod;
    private ?int $flatMPPoolMod;
    private ?int $flatArmorMod;
    private ?int $flatSpellBlockMod;
    private ?int $flatPhysicalDamageMod;
    private ?int $flatMovementSpeedMod;
    private ?float $percentLifeStealMod;
    /**
     * @var float|int|null
     */
    private $flatHPRegenMod;
    private ?float $percentMovementSpeedMod;

    public function getPercentAttackSpeedMod(): ?float
    {
        return $this->percentAttackSpeedMod;
    }

    public function setPercentAttackSpeedMod(?float $percentAttackSpeedMod): ItemStat
    {
        $this->percentAttackSpeedMod = $percentAttackSpeedMod;
        return $this;
    }

    public function getFlatHPPoolMod(): ?int
    {
        return $this->flatHPPoolMod;
    }

    public function setFlatHPPoolMod(?int $flatHPPoolMod): ItemStat
    {
        $this->flatHPPoolMod = $flatHPPoolMod;
        return $this;
    }

    public function getFlatCritChanceMod(): ?float
    {
        return $this->flatCritChanceMod;
    }

    public function setFlatCritChanceMod(?float $flatCritChanceMod): ItemStat
    {
        $this->flatCritChanceMod = $flatCritChanceMod;
        return $this;
    }

    public function getFlatMagicDamageMod(): ?int
    {
        return $this->flatMagicDamageMod;
    }

    public function setFlatMagicDamageMod(?int $flatMagicDamageMod): ItemStat
    {
        $this->flatMagicDamageMod = $flatMagicDamageMod;
        return $this;
    }

    public function getFlatMPPoolMod(): ?int
    {
        return $this->flatMPPoolMod;
    }

    public function setFlatMPPoolMod(?int $flatMPPoolMod): ItemStat
    {
        $this->flatMPPoolMod = $flatMPPoolMod;
        return $this;
    }

    public function getFlatArmorMod(): ?int
    {
        return $this->flatArmorMod;
    }

    public function setFlatArmorMod(?int $flatArmorMod): ItemStat
    {
        $this->flatArmorMod = $flatArmorMod;
        return $this;
    }

    public function getFlatSpellBlockMod(): ?int
    {
        return $this->flatSpellBlockMod;
    }

    public function setFlatSpellBlockMod(?int $flatSpellBlockMod): ItemStat
    {
        $this->flatSpellBlockMod = $flatSpellBlockMod;
        return $this;
    }

    public function getFlatPhysicalDamageMod(): ?int
    {
        return $this->flatPhysicalDamageMod;
    }

    public function setFlatPhysicalDamageMod(?int $flatPhysicalDamageMod): ItemStat
    {
        $this->flatPhysicalDamageMod = $flatPhysicalDamageMod;
        return $this;
    }

    public function getFlatMovementSpeedMod(): ?int
    {
        return $this->flatMovementSpeedMod;
    }

    public function setFlatMovementSpeedMod(?int $flatMovementSpeedMod): ItemStat
    {
        $this->flatMovementSpeedMod = $flatMovementSpeedMod;
        return $this;
    }

    public function getPercentLifeStealMod(): ?float
    {
        return $this->percentLifeStealMod;
    }

    public function setPercentLifeStealMod(?float $percentLifeStealMod): ItemStat
    {
        $this->percentLifeStealMod = $percentLifeStealMod;
        return $this;
    }

    /**
     * @return int|float|null
     */
    public function getFlatHPRegenMod()
    {
        return $this->flatHPRegenMod;
    }

    /**
     * @param int|float|null $flatHPRegenMod
     * @return ItemStat
     */
    public function setFlatHPRegenMod($flatHPRegenMod): ItemStat
    {
        $this->flatHPRegenMod = $flatHPRegenMod;
        return $this;
    }

    /**
     * @return int|float|null
     */
    public function getPercentMovementSpeedMod()
    {
        return $this->percentMovementSpeedMod;
    }

    /**
     * @param int|float|null $percentMovementSpeedMod
     */
    public function setPercentMovementSpeedMod($percentMovementSpeedMod): ItemStat
    {
        $this->percentMovementSpeedMod = $percentMovementSpeedMod;
        return $this;
    }
}
