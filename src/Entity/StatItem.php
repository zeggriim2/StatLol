<?php

namespace App\Entity;

use App\Repository\StatItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatItemRepository::class)
 */
class StatItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PercentAttackSpellMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FlatHPPoolMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $FlatCritChanceMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FlatMagicDamageMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FlatMPPoolMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FlatArmorMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FlatSpellBlockMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FlatPhysicalDamageMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FlatMovemenentSpeedMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PercentLifeStealMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $FlatHPRegenMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PercentMovementSpeedMod;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPercentAttackSpellMod(): ?float
    {
        return $this->PercentAttackSpellMod;
    }

    public function setPercentAttackSpellMod(?float $PercentAttackSpellMod): self
    {
        $this->PercentAttackSpellMod = $PercentAttackSpellMod;

        return $this;
    }

    public function getFlatHPPoolMod(): ?int
    {
        return $this->FlatHPPoolMod;
    }

    public function setFlatHPPoolMod(?int $FlatHPPoolMod): self
    {
        $this->FlatHPPoolMod = $FlatHPPoolMod;

        return $this;
    }

    public function getFlatCritChanceMod(): ?float
    {
        return $this->FlatCritChanceMod;
    }

    public function setFlatCritChanceMod(?float $FlatCritChanceMod): self
    {
        $this->FlatCritChanceMod = $FlatCritChanceMod;

        return $this;
    }

    public function getFlatMagicDamageMod(): ?int
    {
        return $this->FlatMagicDamageMod;
    }

    public function setFlatMagicDamageMod(?int $FlatMagicDamageMod): self
    {
        $this->FlatMagicDamageMod = $FlatMagicDamageMod;

        return $this;
    }

    public function getFlatMPPoolMod(): ?int
    {
        return $this->FlatMPPoolMod;
    }

    public function setFlatMPPoolMod(?int $FlatMPPoolMod): self
    {
        $this->FlatMPPoolMod = $FlatMPPoolMod;

        return $this;
    }

    public function getFlatArmorMod(): ?int
    {
        return $this->FlatArmorMod;
    }

    public function setFlatArmorMod(?int $FlatArmorMod): self
    {
        $this->FlatArmorMod = $FlatArmorMod;

        return $this;
    }

    public function getFlatSpellBlockMod(): ?int
    {
        return $this->FlatSpellBlockMod;
    }

    public function setFlatSpellBlockMod(?int $FlatSpellBlockMod): self
    {
        $this->FlatSpellBlockMod = $FlatSpellBlockMod;

        return $this;
    }

    public function getFlatPhysicalDamageMod(): ?int
    {
        return $this->FlatPhysicalDamageMod;
    }

    public function setFlatPhysicalDamageMod(?int $FlatPhysicalDamageMod): self
    {
        $this->FlatPhysicalDamageMod = $FlatPhysicalDamageMod;

        return $this;
    }

    public function getFlatMovemenentSpeedMod(): ?int
    {
        return $this->FlatMovemenentSpeedMod;
    }

    public function setFlatMovemenentSpeedMod(?int $FlatMovemenentSpeedMod): self
    {
        $this->FlatMovemenentSpeedMod = $FlatMovemenentSpeedMod;

        return $this;
    }

    public function getPercentLifeStealMod(): ?float
    {
        return $this->PercentLifeStealMod;
    }

    public function setPercentLifeStealMod(?float $PercentLifeStealMod): self
    {
        $this->PercentLifeStealMod = $PercentLifeStealMod;

        return $this;
    }

    public function getFlatHPRegenMod(): ?float
    {
        return $this->FlatHPRegenMod;
    }

    public function setFlatHPRegenMod(?float $FlatHPRegenMod): self
    {
        $this->FlatHPRegenMod = $FlatHPRegenMod;

        return $this;
    }

    public function getPercentMovementSpeedMod(): ?float
    {
        return $this->PercentMovementSpeedMod;
    }

    public function setPercentMovementSpeedMod(?float $PercentMovementSpeedMod): self
    {
        $this->PercentMovementSpeedMod = $PercentMovementSpeedMod;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
