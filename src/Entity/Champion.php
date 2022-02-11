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
class Champion
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
     * @ORM\Column(type="string", length=150)
     */
    private string $cle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $idChampion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $blurb;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=InfoChampion::class, inversedBy="champion", cascade={"persist", "remove"})
     */
    private ?InfoChampion $infoChampion;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="champions")
     */
    private ?Version $version;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, inversedBy="champion", cascade={"persist", "remove"})
     */
    private ?Image $image;

    /**
     * @ORM\ManyToOne(targetEntity=PartType::class, inversedBy="champions")
     */
    private ?PartType $partType;

    /**
     * @ORM\OneToOne(targetEntity=StatChampion::class, inversedBy="champion", cascade={"persist", "remove"})
     */
    private ?StatChampion $stat;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(string $getName): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCle(): ?string
    {
        return $this->cle;
    }

    public function setCle(string $cle): self
    {
        $this->cle = $cle;

        return $this;
    }

    public function getIdChampion(): ?string
    {
        return $this->idChampion;
    }

    public function setIdChampion(string $idChampion): self
    {
        $this->idChampion = $idChampion;

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

    public function getInfoChampion(): ?InfoChampion
    {
        return $this->infoChampion;
    }

    public function setInfoChampion(?InfoChampion $infoChampion): self
    {
        $this->infoChampion = $infoChampion;

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

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

    public function setBlurb(?string $blurb): self
    {
        $this->blurb = $blurb;

        return $this;
    }

    public function getPartType(): ?PartType
    {
        return $this->partType;
    }

    public function setPartType(?PartType $partType): self
    {
        $this->partType = $partType;

        return $this;
    }

    public function getStat(): ?StatChampion
    {
        return $this->stat;
    }

    public function setStat(?StatChampion $stat): self
    {
        $this->stat = $stat;

        return $this;
    }
}
