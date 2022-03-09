<?php

namespace App\Entity;

use App\Repository\StatChampionRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatChampionRepository::class)
 */
class StatChampion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="float")
     */
    private float $Hp;

    /**
     * @ORM\Column(type="float")
     */
    private float $HpPerLevel;

    /**
     * @ORM\Column(type="float")
     */
    private float $Mp;

    /**
     * @ORM\Column(type="float")
     */
    private float $MpPerLevel;

    /**
     * @ORM\Column(type="float")
     */
    private float $MoveSpeed;

    /**
     * @ORM\Column(type="float")
     */
    private float $Armor;

    /**
     * @ORM\Column(type="float")
     */
    private float $ArmorPerLevel;

    /**
     * @ORM\Column(type="float")
     */
    private float $SpellBlock;

    /**
     * @ORM\Column(type="float")
     */
    private float $SpellBlockPerLevel;

    /**
     * @ORM\Column(type="float")
     */
    private float $AttackRange;

    /**
     * @ORM\Column(type="float")
     */
    private float $HpRegen;

    /**
     * @ORM\Column(type="float")
     */
    private float $HpRegenPerLevel;

    /**
     * @ORM\Column(type="float")
     */
    private float $MpRegen;

    /**
     * @ORM\Column(type="float")
     */
    private float $MpRegenPerLevel;

    /**
     * @ORM\Column(type="float")
     */
    private float $Crit;

    /**
     * @ORM\Column(type="float")
     */
    private float $CritPerLevel;

    /**
     * @ORM\Column(type="float")
     */
    private float $AttackDamage;

    /**
     * @ORM\Column(type="float")
     */
    private float $AttackDamagePerLevel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $AttackSpeed;

    /**
     * @ORM\Column(type="float")
     */
    private float $AttackSpeedPerLevel;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?\DateTimeImmutable $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Champion::class, mappedBy="stat", cascade={"persist", "remove"})
     */
    private ?Champion $champion;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHp(): ?float
    {
        return $this->Hp;
    }

    public function setHp(float $Hp): self
    {
        $this->Hp = $Hp;

        return $this;
    }

    public function getHpPerLevel(): ?float
    {
        return $this->HpPerLevel;
    }

    public function setHpPerLevel(float $HpPerLevel): self
    {
        $this->HpPerLevel = $HpPerLevel;

        return $this;
    }

    public function getMp(): ?float
    {
        return $this->Mp;
    }

    public function setMp(float $Mp): self
    {
        $this->Mp = $Mp;

        return $this;
    }

    public function getMpPerLevel(): ?float
    {
        return $this->MpPerLevel;
    }

    public function setMpPerLevel(float $MpPerLevel): self
    {
        $this->MpPerLevel = $MpPerLevel;

        return $this;
    }

    public function getMoveSpeed(): ?float
    {
        return $this->MoveSpeed;
    }

    public function setMoveSpeed(float $MoveSpeed): self
    {
        $this->MoveSpeed = $MoveSpeed;

        return $this;
    }

    public function getArmor(): ?float
    {
        return $this->Armor;
    }

    public function setArmor(float $Armor): self
    {
        $this->Armor = $Armor;

        return $this;
    }

    public function getArmorPerLevel(): ?float
    {
        return $this->ArmorPerLevel;
    }

    public function setArmorPerLevel(float $ArmorPerLevel): self
    {
        $this->ArmorPerLevel = $ArmorPerLevel;

        return $this;
    }

    public function getSpellBlock(): ?float
    {
        return $this->SpellBlock;
    }

    public function setSpellBlock(float $SpellBlock): self
    {
        $this->SpellBlock = $SpellBlock;

        return $this;
    }

    public function getSpellBlockPerLevel(): ?float
    {
        return $this->SpellBlockPerLevel;
    }

    public function setSpellBlockPerLevel(float $SpellBlockPerLevel): self
    {
        $this->SpellBlockPerLevel = $SpellBlockPerLevel;

        return $this;
    }

    public function getAttackRange(): ?float
    {
        return $this->AttackRange;
    }

    public function setAttackRange(float $AttackRange): self
    {
        $this->AttackRange = $AttackRange;

        return $this;
    }

    public function getHpRegen(): ?float
    {
        return $this->HpRegen;
    }

    public function setHpRegen(float $HpRegen): self
    {
        $this->HpRegen = $HpRegen;

        return $this;
    }

    public function getHpRegenPerLevel(): ?float
    {
        return $this->HpRegenPerLevel;
    }

    public function setHpRegenPerLevel(float $HpRegenPerLevel): self
    {
        $this->HpRegenPerLevel = $HpRegenPerLevel;

        return $this;
    }

    public function getMpRegen(): ?float
    {
        return $this->MpRegen;
    }

    public function setMpRegen(float $MpRegen): self
    {
        $this->MpRegen = $MpRegen;

        return $this;
    }

    public function getMpRegenPerLevel(): ?float
    {
        return $this->MpRegenPerLevel;
    }

    public function setMpRegenPerLevel(float $MpRegenPerLevel): self
    {
        $this->MpRegenPerLevel = $MpRegenPerLevel;

        return $this;
    }

    public function getCrit(): ?float
    {
        return $this->Crit;
    }

    public function setCrit(float $Crit): self
    {
        $this->Crit = $Crit;

        return $this;
    }

    public function getCritPerLevel(): ?float
    {
        return $this->CritPerLevel;
    }

    public function setCritPerLevel(float $CritPerLevel): self
    {
        $this->CritPerLevel = $CritPerLevel;

        return $this;
    }

    public function getAttackDamage(): ?float
    {
        return $this->AttackDamage;
    }

    public function setAttackDamage(float $AttackDamage): self
    {
        $this->AttackDamage = $AttackDamage;

        return $this;
    }

    public function getAttackDamagePerLevel(): ?float
    {
        return $this->AttackDamagePerLevel;
    }

    public function setAttackDamagePerLevel(float $AttackDamagePerLevel): self
    {
        $this->AttackDamagePerLevel = $AttackDamagePerLevel;

        return $this;
    }

    public function getAttackSpeed(): ?float
    {
        return $this->AttackSpeed;
    }

    public function setAttackSpeed(?float $AttackSpeed): self
    {
        $this->AttackSpeed = $AttackSpeed;

        return $this;
    }

    public function getAttackSpeedPerLevel(): ?float
    {
        return $this->AttackSpeedPerLevel;
    }

    public function setAttackSpeedPerlevel(float $AttackSpeedPerLevel): self
    {
        $this->AttackSpeedPerLevel = $AttackSpeedPerLevel;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getChampion(): ?Champion
    {
        return $this->champion;
    }

    public function setChampion(?Champion $champion): self
    {
        // unset the owning side of the relation if necessary
        if ($champion === null && $this->champion !== null) {
            $this->champion->setStat(null);
        }

        // set the owning side of the relation if necessary
        if ($champion !== null && $champion->getStat() !== $this) {
            $champion->setStat($this);
        }

        $this->champion = $champion;

        return $this;
    }
}
