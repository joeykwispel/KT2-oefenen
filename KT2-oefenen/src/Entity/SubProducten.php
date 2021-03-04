<?php

namespace App\Entity;

use App\Repository\SubProductenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubProductenRepository::class)
 */
class SubProducten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $omschrijving;

    /**
     * @ORM\ManyToOne(targetEntity=Producten::class, inversedBy="Subprod")
     */
    private $ProductLink;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(?string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getProductLink(): ?Producten
    {
        return $this->ProductLink;
    }

    public function setProductLink(?Producten $ProductLink): self
    {
        $this->ProductLink = $ProductLink;

        return $this;
    }
}
