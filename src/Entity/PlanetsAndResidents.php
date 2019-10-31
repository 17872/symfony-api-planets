<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanetsAndResidentsRepository")
 */
class PlanetsAndResidents
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rotation_period;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $orbital_period;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $diameter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $climate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gravity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $terrain;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface_water;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $population;

    /**
     * @ORM\Column(type="array")
     */
    private $residents = [];

    /**
     * @ORM\Column(type="float")
     */
    private $count_residents;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $films = [];

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $edited;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

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

    public function getRotationPeriod(): ?float
    {
        return $this->rotation_period;
    }

    public function setRotationPeriod(float $rotation_period): self
    {
        $this->rotation_period = $rotation_period;

        return $this;
    }

    public function getOrbitalPeriod(): ?float
    {
        return $this->orbital_period;
    }

    public function setOrbitalPeriod(float $orbital_period): self
    {
        $this->orbital_period = $orbital_period;

        return $this;
    }

    public function getDiameter(): ?float
    {
        return $this->diameter;
    }

    public function setDiameter(float $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getClimate(): ?string
    {
        return $this->climate;
    }

    public function setClimate(string $climate): self
    {
        $this->climate = $climate;

        return $this;
    }

    public function getGravity(): ?string
    {
        return $this->gravity;
    }

    public function setGravity(string $gravity): self
    {
        $this->gravity = $gravity;

        return $this;
    }

    public function getTerrain(): ?string
    {
        return $this->terrain;
    }

    public function setTerrain(string $terrain): self
    {
        $this->terrain = $terrain;

        return $this;
    }

    public function getSurfaceWater(): ?float
    {
        return $this->surface_water;
    }

    public function setSurfaceWater(float $surface_water): self
    {
        $this->surface_water = $surface_water;

        return $this;
    }

    public function getPopulation(): ?float
    {
        return $this->population;
    }

    public function setPopulation(float $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getResidents(): ?array
    {
        return $this->residents;
    }

    public function setResidents(array $residents): self
    {
        $this->residents = $residents;

        return $this;
    }

    public function getCountResidents(): ?float
    {
        return $this->count_residents;
    }

    public function setCountResidents(float $count_residents): self
    {
        $this->count_residents = $count_residents;

        return $this;
    }

    public function getFilms(): ?array
    {
        return $this->films;
    }

    public function setFilms(array $films): self
    {
        $this->films = $films;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getEdited(): ?\DateTimeInterface
    {
        return $this->edited;
    }

    public function setEdited(?\DateTimeInterface $edited): self
    {
        $this->edited = $edited;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
