<?php

namespace App\Entity;

use App\Repository\ProductenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductenRepository::class)
 */
class Producten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prijs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $naam;

    /**
     * @ORM\OneToMany(targetEntity=SubProducten::class, mappedBy="ProductLink")
     */
    private $Subprod;

    public function __construct()
    {
        $this->Subprod = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrijs(): ?int
    {
        return $this->prijs;
    }

    public function setPrijs(int $prijs): self
    {
        $this->prijs = $prijs;

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

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * @return Collection|SubProducten[]
     */
    public function getSubprod(): Collection
    {
        return $this->Subprod;
    }

    public function addSubprod(SubProducten $subprod): self
    {
        if (!$this->Subprod->contains($subprod)) {
            $this->Subprod[] = $subprod;
            $subprod->setProductLink($this);
        }

        return $this;
    }

    public function removeSubprod(SubProducten $subprod): self
    {
        if ($this->Subprod->removeElement($subprod)) {
            // set the owning side to null (unless already changed)
            if ($subprod->getProductLink() === $this) {
                $subprod->setProductLink(null);
            }
        }

        return $this;
    }

    public function __toString():string
    {
        return $this->naam;
    }
}