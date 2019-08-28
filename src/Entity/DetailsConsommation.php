<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailsConsommationRepository")
 */
class DetailsConsommation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qteCons;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Consommation", inversedBy="detailsConsommations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $consommation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="detailsConsommations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteCons(): ?int
    {
        return $this->qteCons;
    }

    public function setQteCons(int $qteCons): self
    {
        $this->qteCons = $qteCons;

        return $this;
    }

    public function getConsommation(): ?Consommation
    {
        return $this->consommation;
    }

    public function setConsommation(?Consommation $consommation): self
    {
        $this->consommation = $consommation;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
