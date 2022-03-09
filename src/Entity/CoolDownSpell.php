<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CoolDownSpellRepository;

/**
 * @ORM\Entity(repositoryClass=CoolDownSpellRepository::class)
 */
class CoolDownSpell
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
    private ?int $level1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $level2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $level3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $level4;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $level5;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToOne(targetEntity=Spell::class, mappedBy="coolDown", cascade={"persist", "remove"})
     */
    private ?Spell $spell;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel1(): ?int
    {
        return $this->level1;
    }

    public function setLevel1(int $level1): self
    {
        $this->level1 = $level1;

        return $this;
    }

    public function getLevel2(): ?int
    {
        return $this->level2;
    }

    public function setLevel2(int $level2): self
    {
        $this->level2 = $level2;

        return $this;
    }

    public function getLevel3(): ?int
    {
        return $this->level3;
    }

    public function setLevel3(int $level3): self
    {
        $this->level3 = $level3;

        return $this;
    }

    public function getLevel4(): ?int
    {
        return $this->level4;
    }

    public function setLevel4(int $level4): self
    {
        $this->level4 = $level4;

        return $this;
    }

    public function getLevel5(): ?int
    {
        return $this->level5;
    }

    public function setLevel5(int $level5): self
    {
        $this->level5 = $level5;

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

    public function getSpell(): ?Spell
    {
        return $this->spell;
    }

    public function setSpell(?Spell $spell): self
    {
        // unset the owning side of the relation if necessary
        if ($spell === null && $this->spell !== null) {
            $this->spell->setCoolDown(null);
        }

        // set the owning side of the relation if necessary
        if ($spell !== null && $spell->getCoolDown() !== $this) {
            $spell->setCoolDown($this);
        }

        $this->spell = $spell;

        return $this;
    }
}
