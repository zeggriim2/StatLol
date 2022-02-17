<?php

namespace App\Entity;

use App\Repository\AllyTipChampionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AllyTipChampionRepository::class)
 */
class AllyTipChampion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="text")
     */
    private string $allyTip1;

    /**
     * @ORM\Column(type="text")
     */
    private string $allyTip2;

    /**
     * @ORM\Column(type="text")
     */
    private string $allyTip3;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Champion::class, mappedBy="allyTip")
     * @var Collection|Champion[]
     */
    private $champions;

    public function __construct()
    {
        $this->champions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllyTip1(): ?string
    {
        return $this->allyTip1;
    }

    public function setAllyTip1(string $allyTip1): self
    {
        $this->allyTip1 = $allyTip1;

        return $this;
    }

    public function getAllyTip2(): ?string
    {
        return $this->allyTip2;
    }

    public function setAllyTip2(string $allyTip2): self
    {
        $this->allyTip2 = $allyTip2;

        return $this;
    }

    public function getAllyTip3(): ?string
    {
        return $this->allyTip3;
    }

    public function setAllyTip3(string $allyTip3): self
    {
        $this->allyTip3 = $allyTip3;

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
            $champion->setAllyTip($this);
        }

        return $this;
    }

    public function removeChampion(Champion $champion): self
    {
        if ($this->champions->removeElement($champion)) {
            // set the owning side to null (unless already changed)
            if ($champion->getAllyTip() === $this) {
                $champion->setAllyTip(null);
            }
        }

        return $this;
    }
}
