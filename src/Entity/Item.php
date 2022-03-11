<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
    private string $name;

    /**
     * @ORM\Column(type="text")
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $colloq;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $plaintext;

    /**
     * @ORM\Column(type="integer")
     */
    private int $ItemId;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="items")
     */
    private ?Version $version;

    /**
     * @ORM\ManyToOne(targetEntity=ImageItem::class, inversedBy="items")
     */
    private ?ImageItem $image;

    /**
     * @ORM\ManyToMany(targetEntity=TagItem::class, inversedBy="items")
     * @var Collection|TagItem[]
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getColloq(): ?string
    {
        return $this->colloq;
    }

    public function setColloq(string $colloq): self
    {
        $this->colloq = $colloq;

        return $this;
    }

    public function getPlaintext(): ?string
    {
        return $this->plaintext;
    }

    public function setPlaintext(string $plaintext): self
    {
        $this->plaintext = $plaintext;

        return $this;
    }

    public function getItemId(): ?int
    {
        return $this->ItemId;
    }

    public function setItemId(int $ItemId): self
    {
        $this->ItemId = $ItemId;

        return $this;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    public function setVersion(?Version $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getImage(): ?ImageItem
    {
        return $this->image;
    }

    public function setImage(?ImageItem $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|TagItem[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(TagItem $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(TagItem $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }
}
