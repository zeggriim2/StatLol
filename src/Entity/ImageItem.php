<?php

namespace App\Entity;

use App\Repository\ImageItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageItemRepository::class)
 */
class ImageItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $full;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $sprite;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $groupement;

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
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="image")
     * @var Collection|Item[]
     */
    private $items;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->items = new ArrayCollection();
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

    public function getGroupement(): ?string
    {
        return $this->groupement;
    }

    public function setGroupement(string $groupement): self
    {
        $this->groupement = $groupement;

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

    public function getPosY(): ?int
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

    public function getPosH(): ?int
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

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setImage($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getImage() === $this) {
                $item->setImage(null);
            }
        }

        return $this;
    }
}
