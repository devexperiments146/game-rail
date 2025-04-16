<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MissionRepository::class)]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $city1;

    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $city2;

    #[ORM\Column(type: 'integer')]
    private $points;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity1(): ?City
    {
        return $this->city1;
    }

    public function setCity1(?City $city1): self
    {
        $this->city1 = $city1;

        return $this;
    }

    public function getCity2(): ?City
    {
        return $this->city2;
    }

    public function setCity2(?City $city2): self
    {
        $this->city2 = $city2;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
