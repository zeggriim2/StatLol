<?php

namespace App\Entity;

use App\Repository\EnemyTipChampionRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnemyTipChampionRepository::class)
 */
class EnemyTipChampion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $enemyTip1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $enemyTip2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $enemyTip3;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Champion::class, mappedBy="enemyTip")
     * @var Collection|Champion[]
     */
    private $champions;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->champions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnemyTip1(): ?string
    {
        return $this->enemyTip1;
    }

    public function setEnemyTip1(?string $enemyTip1): self
    {
        $this->enemyTip1 = $enemyTip1;

        return $this;
    }

    public function getEnemyTip2(): ?string
    {
        return $this->enemyTip2;
    }

    public function setEnemyTip2(?string $enemyTip2): self
    {
        $this->enemyTip2 = $enemyTip2;

        return $this;
    }

    public function getEnemyTip3(): ?string
    {
        return $this->enemyTip3;
    }

    public function setEnemyTip3(?string $enemyTip3): self
    {
        $this->enemyTip3 = $enemyTip3;

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

    /**
     * @return Collection|Champion[]
     */
    public function getChampions(): Collection
    {
        return $this->champions;
    }

    public function addChampion(Champion $champion): self
    {
        if (!$this->champions->contains($champion)) {
            $this->champions[] = $champion;
            $champion->setEnemyTip($this);
        }

        return $this;
    }

    public function removeChampion(Champion $champion): self
    {
        if ($this->champions->removeElement($champion)) {
            // set the owning side to null (unless already changed)
            if ($champion->getEnemyTip() === $this) {
                $champion->setEnemyTip(null);
            }
        }

        return $this;
    }
}
