<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResidentsAndPlanetsRepository")
 */
class ResidentsAndPlanets
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
    private $height;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $mass;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hair_color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skin_color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eye_color;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $birth_year;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $homeworld;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $films = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $species = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $vehicles = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $starships = [];

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

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): ?float
    {
        return $this->mass;
    }

    public function setMass(float $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getHairColor(): ?string
    {
        return $this->hair_color;
    }

    public function setHairColor(string $hair_color): self
    {
        $this->hair_color = $hair_color;

        return $this;
    }

    public function getSkinColor(): ?string
    {
        return $this->skin_color;
    }

    public function setSkinColor(string $skin_color): self
    {
        $this->skin_color = $skin_color;

        return $this;
    }

    public function getEyeColor(): ?string
    {
        return $this->eye_color;
    }

    public function setEyeColor(string $eye_color): self
    {
        $this->eye_color = $eye_color;

        return $this;
    }

    public function getBirthYear(): ?string
    {
        return $this->birth_year;
    }

    public function setBirthYear(string $birth_year): self
    {
        $this->birth_year = $birth_year;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHomeworld(): ?string
    {
        return $this->homeworld;
    }

    public function setHomeworld(string $homeworld): self
    {
        $this->homeworld = $homeworld;

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

    public function getSpecies(): ?array
    {
        return $this->species;
    }

    public function setSpecies(array $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getVehicles(): ?array
    {
        return $this->vehicles;
    }

    public function setVehicles(array $vehicles): self
    {
        $this->vehicles = $vehicles;

        return $this;
    }

    public function getStarships(): ?array
    {
        return $this->starships;
    }

    public function setStarships(array $starships): self
    {
        $this->starships = $starships;

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
