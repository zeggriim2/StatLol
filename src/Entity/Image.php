<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ChampionRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields="name", message="Name is already taken.")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $full;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $sprite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private int $posX;

    /**
     * @ORM\Column(type="integer")
     */
    private int $posY;

    /**
     * @ORM\Column(type="integer")
     */
    private int $posW;

    /**
     * @ORM\Column(type="integer")
     */
    private int $posH;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Champion::class, mappedBy="image", cascade={"persist", "remove"})
     */
    private ?Champion $champion;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFull(): ?string
    {
        return $this->full;
    }

    public function setFull(string $full): self
    {
        $this->full = $full;

        return $this;
    }

    public function getSprite(): ?string
    {
        return $this->sprite;
    }

    public function setSprite(string $sprite): self
    {
        $this->sprite = $sprite;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPosX(): ?int
    {
        return $this->posX;
    }

    public function setPosX(int $posX): self
    {
        $this->posX = $posX;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->posY;
    }

    public function setPosY(int $posY): self
    {
        $this->posY = $posY;

        return $this;
    }

    public function getPosW(): ?int
    {
        return $this->posW;
    }

    public function setPosW(int $posW): self
    {
        $this->posW = $posW;

        return $this;
    }

    public function getH(): ?int
    {
        return $this->posH;
    }

    public function setPosH(int $posH): self
    {
        $this->posH = $posH;

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

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
    */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTimeImmutable('now'));
        }
    }

    public function getChampion(): ?Champion
    {
        return $this->champion;
    }

    public function setChampion(?Champion $champion): self
    {
        // unset the owning side of the relation if necessary
        if ($champion === null && $this->champion !== null) {
            $this->champion->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($champion !== null && $champion->getImage() !== $this) {
            $champion->setImage($this);
        }

        $this->champion = $champion;

        return $this;
    }
}
