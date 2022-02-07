<?php

namespace App\Entity;

use App\Repository\LeagueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LeagueRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class League
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $leagueId;

    /**
     * @ORM\Column(type="integer")
     */
    private $leaguePoints;

    /**
     * @ORM\Column(type="integer")
     */
    private $wins;

    /**
     * @ORM\Column(type="integer")
     */
    private $losses;

    /**
     * @ORM\Column(type="boolean")
     */
    private $veteran;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inactive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $freshBlood;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hotStreak;

    /**
     * @ORM\ManyToOne(targetEntity=Summoner::class, inversedBy="leagues")
     */
    private $summoner;

    /**
     * @ORM\ManyToOne(targetEntity=Queue::class, inversedBy="leagues")
     */
    private $queue;

    /**
     * @ORM\ManyToOne(targetEntity=Tier::class, inversedBy="leagues")
     */
    private $tier;

    /**
     * @ORM\ManyToOne(targetEntity=Division::class, inversedBy="leagues")
     */
    private $division;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updateAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeagueId(): ?string
    {
        return $this->leagueId;
    }

    public function setLeagueId(?string $leagueId): self
    {
        $this->leagueId = $leagueId;

        return $this;
    }

    public function getLeaguePoints(): ?int
    {
        return $this->leaguePoints;
    }

    public function setLeaguePoints(int $leaguePoints): self
    {
        $this->leaguePoints = $leaguePoints;

        return $this;
    }

    public function getWins(): ?int
    {
        return $this->wins;
    }

    public function setWins(int $wins): self
    {
        $this->wins = $wins;

        return $this;
    }

    public function getLosses(): ?int
    {
        return $this->losses;
    }

    public function setLosses(int $losses): self
    {
        $this->losses = $losses;

        return $this;
    }

    public function getVeteran(): ?bool
    {
        return $this->veteran;
    }

    public function getVeteranOuiNon(): ?string
    {
        return $this->veteran ? "oui" : "non";
    }

    public function setVeteran(bool $veteran): self
    {
        $this->veteran = $veteran;

        return $this;
    }

    public function getInactive(): ?bool
    {
        return $this->inactive;
    }

    public function getInactiveOuiNon(): ?string
    {
        return $this->inactive ? "oui" : "non";
    }

    public function setInactive(bool $inactive): self
    {
        $this->inactive = $inactive;

        return $this;
    }

    public function getFreshBlood(): ?bool
    {
        return $this->freshBlood;
    }

    public function getFreshBloodOuiNon(): ?string
    {
        return $this->freshBlood ? "oui" : "non";
    }

    public function setFreshBlood(bool $freshBlood): self
    {
        $this->freshBlood = $freshBlood;

        return $this;
    }

    public function getHotStreak(): ?bool
    {
        return $this->hotStreak;
    }

    public function getHotStreakOuiNon(): ?string
    {
        return $this->hotStreak ? "oui" : "non";
    }

    public function setHotStreak(bool $hotStreak): self
    {
        $this->hotStreak = $hotStreak;

        return $this;
    }

    public function getSummoner(): ?Summoner
    {
        return $this->summoner;
    }

    public function setSummoner(?Summoner $summoner): self
    {
        $this->summoner = $summoner;

        return $this;
    }

    public function getQueue(): ?Queue
    {
        return $this->queue;
    }

    public function setQueue(?Queue $queue): self
    {
        $this->queue = $queue;

        return $this;
    }

    public function getTier(): ?Tier
    {
        return $this->tier;
    }

    public function setTier(?Tier $tier): self
    {
        $this->tier = $tier;

        return $this;
    }

    public function getDivision(): ?Division
    {
        return $this->division;
    }

    public function setDivision(?Division $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
    */
    public function updatedTimestamps(): void
    {
        $this->setUpdateAt(new \DateTimeImmutable('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTimeImmutable('now'));
        }
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
