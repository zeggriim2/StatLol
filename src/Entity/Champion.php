<?php

namespace App\Entity;

use App\Entity\Spell;
use App\Entity\Version;
use App\Entity\TagChampion;
use App\Entity\InfoChampion;
use App\Entity\SkinChampion;
use App\Entity\StatChampion;
use App\Entity\ImageChampion;
use App\Entity\ParTypeChampion;
use App\Entity\PassiveChampion;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ChampionRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ChampionRepository::class)
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
     * @ORM\Column(type="string", length=70)
     */
    private string $idChampion;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private string $cle;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="text")
     */
    private string $blurb;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $lore;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?\DateTimeImmutable $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="champions")
     */
    private ?Version $version;

    /**
     * @ORM\ManyToOne(targetEntity=PassiveChampion::class, inversedBy="champions")
     */
    private ?PassiveChampion $passive;

    /**
     * @ORM\ManyToOne(targetEntity=ImageChampion::class, inversedBy="champions")
     */
    private ?ImageChampion $image;

    /**
     * @ORM\OneToOne(targetEntity=StatChampion::class, inversedBy="champion", cascade={"persist", "remove"})
     */
    private ?StatChampion $stat;

    /**
     * @ORM\ManyToMany(targetEntity=Spell::class, inversedBy="champions")
     * @var Collection|Spell[]
     */
    private $spells;

    /**
     * @ORM\ManyToOne(targetEntity=ParTypeChampion::class, inversedBy="champions")
     */
    private ?ParTypeChampion $parType;

    /**
     * @ORM\ManyToMany(targetEntity=TagChampion::class, inversedBy="champions")
     * @var Collection|TagChampion[]
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity=SkinChampion::class, inversedBy="champions")
     * @var Collection|SkinChampion[]
     */
    private $skins;

    /**
     * @ORM\ManyToOne(targetEntity=EnemyTipChampion::class, inversedBy="champions")
     */
    private ?EnemyTipChampion $enemyTip;

    /**
     * @ORM\ManyToOne(targetEntity=AllyTipChampion::class, inversedBy="champions")
     */
    private ?AllyTipChampion $allyTip;

    /**
     * @ORM\ManyToOne(targetEntity=InfoChampion::class, inversedBy="champions")
     */
    private $infoChampion;

    public function __construct()
    {
        $this->createdAt =  new DateTimeImmutable();
        $this->spells = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->skins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCle(): ?string
    {
        return $this->cle;
    }

    public function setCle(string $cle): self
    {
        $this->cle = $cle;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): self
    {
        $this->blurb = $blurb;

        return $this;
    }

    public function getLore(): ?string
    {
        return $this->lore;
    }

    public function setLore(?string $lore): self
    {
        $this->lore = $lore;

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

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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

    public function getPassive(): ?PassiveChampion
    {
        return $this->passive;
    }

    public function setPassive(?PassiveChampion $passive): self
    {
        $this->passive = $passive;

        return $this;
    }

    public function getImage(): ?ImageChampion
    {
        return $this->image;
    }

    public function setImage(?ImageChampion $image): self
    {
        $this->image = $image;

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
        }

        return $this;
    }

    public function removeSpell(Spell $spell): self
    {
        $this->spells->removeElement($spell);

        return $this;
    }

    public function getParType(): ?ParTypeChampion
    {
        return $this->parType;
    }

    public function setParType(?ParTypeChampion $parType): self
    {
        $this->parType = $parType;

        return $this;
    }

    /**
     * @return Collection|TagChampion[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(TagChampion $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(TagChampion $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @return Collection|SkinChampion[]
     */
    public function getSkins(): Collection
    {
        return $this->skins;
    }

    public function addSkin(SkinChampion $skin): self
    {
        if (!$this->skins->contains($skin)) {
            $this->skins[] = $skin;
        }

        return $this;
    }

    public function removeSkin(SkinChampion $skin): self
    {
        $this->skins->removeElement($skin);

        return $this;
    }

    public function getEnemyTip(): ?EnemyTipChampion
    {
        return $this->enemyTip;
    }

    public function setEnemyTip(?EnemyTipChampion $enemyTip): self
    {
        $this->enemyTip = $enemyTip;

        return $this;
    }

    public function getAllyTip(): ?AllyTipChampion
    {
        return $this->allyTip;
    }

    public function setAllyTip(?AllyTipChampion $allyTip): self
    {
        $this->allyTip = $allyTip;

        return $this;
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
}
