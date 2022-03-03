<?php

namespace App\Entity;

use App\Repository\SkinChampionRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkinChampionRepository::class)
 */
class SkinChampion
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
    private int $skinId;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private ?int $num;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private string $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $chromas;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=Champion::class, mappedBy="skins")
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

    public function getSkinId(): ?int
    {
        return $this->skinId;
    }

    public function setSkinId(int $skinId): self
    {
        $this->skinId = $skinId;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(?int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getChromas(): ?bool
    {
        return $this->chromas;
    }

    public function setChromas(?bool $chromas): self
    {
        $this->chromas = $chromas;

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
            $champion->addSkin($this);
        }

        return $this;
    }

    public function removeChampion(Champion $champion): self
    {
        if ($this->champions->removeElement($champion)) {
            $champion->removeSkin($this);
        }

        return $this;
    }
}
