<?php

namespace App\Entity;

use App\Repository\PlayerResultRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerResultRepository::class)]
class PlayerResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Player::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $player;

    #[ORM\Column(type: 'integer')]
    private $railwayPoints;

    #[ORM\ManyToOne(targetEntity: Party::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $party;

    #[ORM\Column(type: 'boolean')]
    private $longestRailway;

    #[ORM\Column(type: 'integer')]
    private $stationPoints;

    #[ORM\Column(type: 'integer')]
    private $missionPoints;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getRailwayPoints(): ?int
    {
        return $this->railwayPoints;
    }

    public function setRailwayPoints(int $railwayPoints): self
    {
        $this->railwayPoints = $railwayPoints;

        return $this;
    }

    public function getParty(): ?Party
    {
        return $this->party;
    }

    public function setParty(?Party $party): self
    {
        $this->party = $party;

        return $this;
    }

    public function isLongestRailway(): ?bool
    {
        return $this->longestRailway;
    }

    public function setLongestRailway(bool $longestRailway): self
    {
        $this->longestRailway = $longestRailway;

        return $this;
    }

    public function getStationPoints(): ?int
    {
        return $this->stationPoints;
    }

    public function setStationPoints(int $stationPoints): self
    {
        $this->stationPoints = $stationPoints;

        return $this;
    }

    public function getMissionPoints(): ?int
    {
        return $this->missionPoints;
    }

    public function setMissionPoints(int $missionPoints): self
    {
        $this->missionPoints = $missionPoints;

        return $this;
    }
}
