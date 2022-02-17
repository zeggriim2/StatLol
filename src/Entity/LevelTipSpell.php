<?php

namespace App\Entity;

use App\Entity\Spell;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LevelTipSpellRepository;

/**
 * @ORM\Entity(repositoryClass=LevelTipSpellRepository::class)
 */
class LevelTipSpell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @var array<string>|null
     */
    private ?array $label = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     * @var array<string>|null
     */
    private ?array $effect = [];

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToOne(targetEntity=Spell::class, mappedBy="levelTip", cascade={"persist", "remove"})
     */
    private ?Spell $spell;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return array<string>|null
     */
    public function getLabel(): ?array
    {
        return $this->label;
    }

    /**
     * @param array<string>|null $label
     */
    public function setLabel(?array $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return array<string>|null
     */
    public function getEffect(): ?array
    {
        return $this->effect;
    }

    /**
     * @param array<string>|null $effect
     */
    public function setEffect(?array $effect): self
    {
        $this->effect = $effect;

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
            $this->spell->setLevelTip(null);
        }

        // set the owning side of the relation if necessary
        if ($spell !== null && $spell->getLevelTip() !== $this) {
            $spell->setLevelTip($this);
        }

        $this->spell = $spell;

        return $this;
    }
}
