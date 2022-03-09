<?php

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpellRepository::class)
 */
class Spell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private string $idSpell;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private string $name;

    /**
     * @ORM\Column(type="text")
     */
    private string $description;

    /**
     * @ORM\Column(type="text")
     */
    private string $tooltip;

    /**
     * @ORM\Column(type="integer")
     */
    private int $maxrank;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private string $coolDownBurn;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private string $costBurn;

    /**
     * @ORM\Column(type="json")
     * @var array<null|array<int>>
     */
    private array $effect = [];

    /**
     * @ORM\Column(type="json")
     * @var array<string>
     */
    private array $effectBurn = [];

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $costType;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private ?string $maxammo;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private string $rangeBurn;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $resource;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?\DateTimeImmutable $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=CoolDownSpell::class, inversedBy="spell", cascade={"persist", "remove"})
     */
    private ?CoolDownSpell $coolDown;

    /**
     * @ORM\OneToOne(targetEntity=LevelTipSpell::class, inversedBy="spell", cascade={"persist", "remove"})
     */
    private ?LevelTipSpell $levelTip;

    /**
     * @ORM\OneToOne(targetEntity=CostSpell::class, inversedBy="spell", cascade={"persist", "remove"})
     */
    private ?CostSpell $cost;

    /**
     * @ORM\OneToOne(targetEntity=RangeSpell::class, inversedBy="spell", cascade={"persist", "remove"})
     */
    private ?RangeSpell $rangeSpell;

    /**
     * @ORM\ManyToOne(targetEntity=ImageSpell::class, inversedBy="spells")
     */
    private ?ImageSpell $image;

    /**
     * @ORM\ManyToMany(targetEntity=Champion::class, mappedBy="spells")
     * @var Collection|Champion[]
     */
    private $champions;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->champions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSpell(): ?string
    {
        return $this->idSpell;
    }

    public function setIdSpell(string $idSpell): self
    {
        $this->idSpell = $idSpell;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTooltip(): ?string
    {
        return $this->tooltip;
    }

    public function setTooltip(string $tooltip): self
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    public function getMaxrank(): ?int
    {
        return $this->maxrank;
    }

    public function setMaxrank(int $maxrank): self
    {
        $this->maxrank = $maxrank;

        return $this;
    }

    public function getCoolDownBurn(): ?string
    {
        return $this->coolDownBurn;
    }

    public function setCoolDownBurn(string $coolDownBurn): self
    {
        $this->coolDownBurn = $coolDownBurn;

        return $this;
    }

    public function getCostBurn(): ?string
    {
        return $this->costBurn;
    }

    public function setCostBurn(string $costBurn): self
    {
        $this->costBurn = $costBurn;

        return $this;
    }

    /**
     * @return array<null|array<int>>|null
     */
    public function getEffect(): ?array
    {
        return $this->effect;
    }

    /**
     * @param array<null|array<int>> $effect
     */
    public function setEffect(array $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * @return array<string>|null
     */
    public function getEffectBurn(): ?array
    {
        return $this->effectBurn;
    }

    /**
     * @param array<string> $effectBurn
     */
    public function setEffectBurn(array $effectBurn): self
    {
        $this->effectBurn = $effectBurn;

        return $this;
    }

    public function getCostType(): ?string
    {
        return $this->costType;
    }

    public function setCostType(string $costType): self
    {
        $this->costType = $costType;

        return $this;
    }

    public function getMaxammo(): ?string
    {
        return $this->maxammo;
    }

    public function setMaxammo(?string $maxammo): self
    {
        $this->maxammo = $maxammo;

        return $this;
    }

    public function getRangeBurn(): ?string
    {
        return $this->rangeBurn;
    }

    public function setRangeBurn(string $rangeBurn): self
    {
        $this->rangeBurn = $rangeBurn;

        return $this;
    }

    public function getResource(): ?string
    {
        return $this->resource;
    }

    public function setResource(string $resource): self
    {
        $this->resource = $resource;

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

    public function getCoolDown(): ?CoolDownSpell
    {
        return $this->coolDown;
    }

    public function setCoolDown(?CoolDownSpell $coolDown): self
    {
        $this->coolDown = $coolDown;

        return $this;
    }

    public function getLevelTip(): ?LevelTipSpell
    {
        return $this->levelTip;
    }

    public function setLevelTip(?LevelTipSpell $levelTip): self
    {
        $this->levelTip = $levelTip;

        return $this;
    }

    public function getCost(): ?CostSpell
    {
        return $this->cost;
    }

    public function setCost(?CostSpell $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getRangeSpell(): ?RangeSpell
    {
        return $this->rangeSpell;
    }

    public function setRangeSpell(?RangeSpell $rangeSpell): self
    {
        $this->rangeSpell = $rangeSpell;

        return $this;
    }

    public function getImage(): ?ImageSpell
    {
        return $this->image;
    }

    public function setImage(?ImageSpell $image): self
    {
        $this->image = $image;

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
            $champion->addSpell($this);
        }

        return $this;
    }

    public function removeChampion(Champion $champion): self
    {
        if ($this->champions->removeElement($champion)) {
            $champion->removeSpell($this);
        }

        return $this;
    }
}
