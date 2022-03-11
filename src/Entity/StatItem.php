<?php

namespace App\Entity;

use App\Repository\StatItemRepository;
use DateTimeImmutable;
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
    private int $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $PercentAttackSpellMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $FlatHPPoolMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $FlatCritChanceMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $FlatMagicDamageMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $FlatMPPoolMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $FlatArmorMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $FlatSpellBlockMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $FlatPhysicalDamageMod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $FlatMovemenentSpeedMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $PercentLifeStealMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $FlatHPRegenMod;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $PercentMovementSpeedMod;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToOne(targetEntity=Item::class, mappedBy="stat", cascade={"persist", "remove"})
     */
    private $item;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

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

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        // unset the owning side of the relation if necessary
        if ($item === null && $this->item !== null) {
            $this->item->setStat(null);
        }

        // set the owning side of the relation if necessary
        if ($item !== null && $item->getStat() !== $this) {
            $item->setStat($this);
        }

        $this->item = $item;

        return $this;
    }
}
