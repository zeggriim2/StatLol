<?php

namespace App\Entity;

use App\Repository\InfoChampionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoChampionRepository::class)
 */
class InfoChampion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $attack;

    /**
     * @ORM\Column(type="integer")
     */
    private int $defense;

    /**
     * @ORM\Column(type="integer")
     */
    private int $magic;

    /**
     * @ORM\Column(type="integer")
     */
    private int $difficulty;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToOne(targetEntity=Champion::class, mappedBy="info", cascade={"persist", "remove"})
     */
    private ?Champion $champion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getMagic(): ?int
    {
        return $this->magic;
    }

    public function setMagic(int $magic): self
    {
        $this->magic = $magic;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

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

    public function getChampion(): ?Champion
    {
        return $this->champion;
    }

    public function setChampion(?Champion $champion): self
    {
        // unset the owning side of the relation if necessary
        if ($champion === null && $this->champion !== null) {
            $this->champion->setInfo(null);
        }

        // set the owning side of the relation if necessary
        if ($champion !== null && $champion->getInfo() !== $this) {
            $champion->setInfo($this);
        }

        $this->champion = $champion;

        return $this;
    }
}
