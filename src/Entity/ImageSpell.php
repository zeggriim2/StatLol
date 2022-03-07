<?php

namespace App\Entity;

use App\Repository\ImageSpellRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageSpellRepository::class)
 */
class ImageSpell
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
     * @ORM\OneToMany(targetEntity=Spell::class, mappedBy="image")
     * @var Collection|Spell[]
     */
    private $spells;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->spells = new ArrayCollection();
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
     * @return Collection|Spell[]
     */
    public function getSpells(): Collection
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): self
    {
        if (!$this->spells->contains($spell)) {
            $this->spells[] = $spell;
            $spell->setImage($this);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): self
    {
        if ($this->spells->removeElement($spell)) {
            // set the owning side to null (unless already changed)
            if ($spell->getImage() === $this) {
                $spell->setImage(null);
            }
        }

        return $this;
    }
}
