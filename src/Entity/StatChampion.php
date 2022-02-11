<?php

namespace App\Entity;

use App\Repository\StatChampionRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $hp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $HpPerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $mp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $mpPerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $moveSpeed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $armor;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $armorPerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $spellBlock;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $spellBlockPerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $attackRange;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $hpRegen;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $hpRegenPerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $mpRegen;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $mpRegenPerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $crit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $critPerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $attackDamage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $attackDamagePerLevel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $attackSpeed;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $attackSpeedPerLevel;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Champion::class, mappedBy="stat", cascade={"persist", "remove"})
     */
    private Champion $champion;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(?int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getHpPerLevel(): ?int
    {
        return $this->HpPerLevel;
    }

    public function setHpPerLevel(?int $HpPerLevel): self
    {
        $this->HpPerLevel = $HpPerLevel;

        return $this;
    }

    public function getMp(): ?int
    {
        return $this->mp;
    }

    public function setMp(?int $mp): self
    {
        $this->mp = $mp;

        return $this;
    }

    public function getMpPerLevel(): ?int
    {
        return $this->mpPerLevel;
    }

    public function setMpPerLevel(?int $mpPerLevel): self
    {
        $this->mpPerLevel = $mpPerLevel;

        return $this;
    }

    public function getMoveSpeed(): ?int
    {
        return $this->moveSpeed;
    }

    public function setMoveSpeed(?int $moveSpeed): self
    {
        $this->moveSpeed = $moveSpeed;

        return $this;
    }

    public function getArmor(): ?int
    {
        return $this->armor;
    }

    public function setArmor(?int $armor): self
    {
        $this->armor = $armor;

        return $this;
    }

    public function getArmorPerLevel(): ?float
    {
        return $this->armorPerLevel;
    }

    public function setArmorPerLevel(?float $armorPerLevel): self
    {
        $this->armorPerLevel = $armorPerLevel;

        return $this;
    }

    public function getSpellBlock(): ?int
    {
        return $this->spellBlock;
    }

    public function setSpellBlock(?int $spellBlock): self
    {
        $this->spellBlock = $spellBlock;

        return $this;
    }

    public function getSpellBlockPerLevel(): ?float
    {
        return $this->spellBlockPerLevel;
    }

    public function setSpellBlockPerLevel(?float $spellBlockPerLevel): self
    {
        $this->spellBlockPerLevel = $spellBlockPerLevel;

        return $this;
    }

    public function getAttackRange(): ?int
    {
        return $this->attackRange;
    }

    public function setAttackRange(?int $attackRange): self
    {
        $this->attackRange = $attackRange;

        return $this;
    }

    public function getHpRegen(): ?float
    {
        return $this->hpRegen;
    }

    public function setHpRegen(?float $hpRegen): self
    {
        $this->hpRegen = $hpRegen;

        return $this;
    }

    public function getHpRegenPerLevel(): ?float
    {
        return $this->hpRegenPerLevel;
    }

    public function setHpRegenPerLevel(?float $hpRegenPerLevel): self
    {
        $this->hpRegenPerLevel = $hpRegenPerLevel;

        return $this;
    }

    public function getMpRegen(): ?int
    {
        return $this->mpRegen;
    }

    public function setMpRegen(?int $mpRegen): self
    {
        $this->mpRegen = $mpRegen;

        return $this;
    }

    public function getMpRegenPerLevel(): ?float
    {
        return $this->mpRegenPerLevel;
    }

    public function setMpRegenPerLevel(?float $mpRegenPerLevel): self
    {
        $this->mpRegenPerLevel = $mpRegenPerLevel;

        return $this;
    }

    public function getCrit(): ?int
    {
        return $this->crit;
    }

    public function setCrit(?int $crit): self
    {
        $this->crit = $crit;

        return $this;
    }

    public function getCritPerLevel(): ?int
    {
        return $this->critPerLevel;
    }

    public function setCritPerLevel(?int $critPerLevel): self
    {
        $this->critPerLevel = $critPerLevel;

        return $this;
    }

    public function getAttackDamage(): ?int
    {
        return $this->attackDamage;
    }

    public function setAttackDamage(?int $attackDamage): self
    {
        $this->attackDamage = $attackDamage;

        return $this;
    }

    public function getAttackDamagePerLevel(): ?int
    {
        return $this->attackDamagePerLevel;
    }

    public function setAttackDamagePerLevel(?int $attackDamagePerLevel): self
    {
        $this->attackDamagePerLevel = $attackDamagePerLevel;

        return $this;
    }

    public function getAttackSpeed(): ?float
    {
        return $this->attackSpeed;
    }

    public function setAttackSpeed(?float $attackSpeed): self
    {
        $this->attackSpeed = $attackSpeed;

        return $this;
    }

    public function getAttackSpeedPerLevel(): ?float
    {
        return $this->attackSpeedPerLevel;
    }

    public function setAttackSpeedPerLevel(?float $attackSpeedPerLevel): self
    {
        $this->attackSpeedPerLevel = $attackSpeedPerLevel;

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

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
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
