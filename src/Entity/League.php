<?php

namespace App\Entity;

use App\Repository\LeagueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LeagueRepository::class)
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
}
