<?php

namespace App\Services\API\LOL\Model\DataDragon\Item;

class ItemStat
{
    private ?int $FlatMovementSpeedMod;
    private ?int $FlatHPPoolMod;
    private ?float $FlatCritChanceMod;
    private ?int $FlatMagicDamageMod;
    private ?int $FlatMPPoolMod;
    private ?int $FlatArmorMod;
    private ?int $FlatSpellBlockMod;
    private ?int $FlatPhysicalDamageMod;
    private ?float $PercentAttackSpeedMod;
    private ?float $PercentLifeStealMod;
    private ?float $FlatHPRegenMod;
    private ?float $PercentMovementSpeedMod;

    /**
     * @return int|null
     */
    public function getFlatMovementSpeedMod(): ?int
    {
        return $this->FlatMovementSpeedMod;
    }

    /**
     * @param int|null $FlatMovementSpeedMod
     * @return ItemStat
     */
    public function setFlatMovementSpeedMod(?int $FlatMovementSpeedMod): ItemStat
    {
        $this->FlatMovementSpeedMod = $FlatMovementSpeedMod;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlatHPPoolMod(): ?int
    {
        return $this->FlatHPPoolMod;
    }

    /**
     * @param int|null $FlatHPPoolMod
     * @return ItemStat
     */
    public function setFlatHPPoolMod(?int $FlatHPPoolMod): ItemStat
    {
        $this->FlatHPPoolMod = $FlatHPPoolMod;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getFlatCritChanceMod(): ?float
    {
        return $this->FlatCritChanceMod;
    }

    /**
     * @param float|null $FlatCritChanceMod
     * @return ItemStat
     */
    public function setFlatCritChanceMod(?float $FlatCritChanceMod): ItemStat
    {
        $this->FlatCritChanceMod = $FlatCritChanceMod;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlatMagicDamageMod(): ?int
    {
        return $this->FlatMagicDamageMod;
    }

    /**
     * @param int|null $FlatMagicDamageMod
     * @return ItemStat
     */
    public function setFlatMagicDamageMod(?int $FlatMagicDamageMod): ItemStat
    {
        $this->FlatMagicDamageMod = $FlatMagicDamageMod;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlatMPPoolMod(): ?int
    {
        return $this->FlatMPPoolMod;
    }

    /**
     * @param int|null $FlatMPPoolMod
     * @return ItemStat
     */
    public function setFlatMPPoolMod(?int $FlatMPPoolMod): ItemStat
    {
        $this->FlatMPPoolMod = $FlatMPPoolMod;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlatArmorMod(): ?int
    {
        return $this->FlatArmorMod;
    }

    /**
     * @param int|null $FlatArmorMod
     * @return ItemStat
     */
    public function setFlatArmorMod(?int $FlatArmorMod): ItemStat
    {
        $this->FlatArmorMod = $FlatArmorMod;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlatSpellBlockMod(): ?int
    {
        return $this->FlatSpellBlockMod;
    }

    /**
     * @param int|null $FlatSpellBlockMod
     * @return ItemStat
     */
    public function setFlatSpellBlockMod(?int $FlatSpellBlockMod): ItemStat
    {
        $this->FlatSpellBlockMod = $FlatSpellBlockMod;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlatPhysicalDamageMod(): ?int
    {
        return $this->FlatPhysicalDamageMod;
    }

    /**
     * @param int|null $FlatPhysicalDamageMod
     * @return ItemStat
     */
    public function setFlatPhysicalDamageMod(?int $FlatPhysicalDamageMod): ItemStat
    {
        $this->FlatPhysicalDamageMod = $FlatPhysicalDamageMod;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPercentAttackSpeedMod(): ?float
    {
        return $this->PercentAttackSpeedMod;
    }

    /**
     * @param float|null $PercentAttackSpeedMod
     * @return ItemStat
     */
    public function setPercentAttackSpeedMod(?float $PercentAttackSpeedMod): ItemStat
    {
        $this->PercentAttackSpeedMod = $PercentAttackSpeedMod;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPercentLifeStealMod(): ?float
    {
        return $this->PercentLifeStealMod;
    }

    /**
     * @param float|null $PercentLifeStealMod
     * @return ItemStat
     */
    public function setPercentLifeStealMod(?float $PercentLifeStealMod): ItemStat
    {
        $this->PercentLifeStealMod = $PercentLifeStealMod;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getFlatHPRegenMod(): ?float
    {
        return $this->FlatHPRegenMod;
    }

    /**
     * @param float|null $FlatHPRegenMod
     * @return ItemStat
     */
    public function setFlatHPRegenMod(?float $FlatHPRegenMod): ItemStat
    {
        $this->FlatHPRegenMod = $FlatHPRegenMod;
        return $this;
    }
    
    public function getPercentMovementSpeedMod(): ?float
    {
        return $this->PercentMovementSpeedMod;
    }

    public function setPercentMovementSpeedMod(?float $PercentMovementSpeedMod): ItemStat
    {
        $this->PercentMovementSpeedMod = $PercentMovementSpeedMod;
        return $this;
    }
}
