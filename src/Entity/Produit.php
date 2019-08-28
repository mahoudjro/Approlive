<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libProd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $posologie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockStructure", mappedBy="produit")
     */
    private $stockStructures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailsConsommation", mappedBy="produit")
     */
    private $detailsConsommations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailsTransfert", mappedBy="produit")
     */
    private $detailsTransferts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailsApprovisionnement", mappedBy="produit")
     */
    private $detailsApprovisionnements;

    public function __construct()
    {
        $this->stockStructures = new ArrayCollection();
        $this->detailsConsommations = new ArrayCollection();
        $this->detailsTransferts = new ArrayCollection();
        $this->detailsApprovisionnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibProd(): ?string
    {
        return $this->libProd;
    }

    public function setLibProd(string $libProd): self
    {
        $this->libProd = $libProd;

        return $this;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(string $posologie): self
    {
        $this->posologie = $posologie;

        return $this;
    }

    /**
     * @return Collection|StockStructure[]
     */
    public function getStockStructures(): Collection
    {
        return $this->stockStructures;
    }

    public function addStockStructure(StockStructure $stockStructure): self
    {
        if (!$this->stockStructures->contains($stockStructure)) {
            $this->stockStructures[] = $stockStructure;
            $stockStructure->setProduit($this);
        }

        return $this;
    }

    public function removeStockStructure(StockStructure $stockStructure): self
    {
        if ($this->stockStructures->contains($stockStructure)) {
            $this->stockStructures->removeElement($stockStructure);
            // set the owning side to null (unless already changed)
            if ($stockStructure->getProduit() === $this) {
                $stockStructure->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DetailsConsommation[]
     */
    public function getDetailsConsommations(): Collection
    {
        return $this->detailsConsommations;
    }

    public function addDetailsConsommation(DetailsConsommation $detailsConsommation): self
    {
        if (!$this->detailsConsommations->contains($detailsConsommation)) {
            $this->detailsConsommations[] = $detailsConsommation;
            $detailsConsommation->setProduit($this);
        }

        return $this;
    }

    public function removeDetailsConsommation(DetailsConsommation $detailsConsommation): self
    {
        if ($this->detailsConsommations->contains($detailsConsommation)) {
            $this->detailsConsommations->removeElement($detailsConsommation);
            // set the owning side to null (unless already changed)
            if ($detailsConsommation->getProduit() === $this) {
                $detailsConsommation->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DetailsTransfert[]
     */
    public function getDetailsTransferts(): Collection
    {
        return $this->detailsTransferts;
    }

    public function addDetailsTransfert(DetailsTransfert $detailsTransfert): self
    {
        if (!$this->detailsTransferts->contains($detailsTransfert)) {
            $this->detailsTransferts[] = $detailsTransfert;
            $detailsTransfert->setProduit($this);
        }

        return $this;
    }

    public function removeDetailsTransfert(DetailsTransfert $detailsTransfert): self
    {
        if ($this->detailsTransferts->contains($detailsTransfert)) {
            $this->detailsTransferts->removeElement($detailsTransfert);
            // set the owning side to null (unless already changed)
            if ($detailsTransfert->getProduit() === $this) {
                $detailsTransfert->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DetailsApprovisionnement[]
     */
    public function getDetailsApprovisionnements(): Collection
    {
        return $this->detailsApprovisionnements;
    }

    public function addDetailsApprovisionnement(DetailsApprovisionnement $detailsApprovisionnement): self
    {
        if (!$this->detailsApprovisionnements->contains($detailsApprovisionnement)) {
            $this->detailsApprovisionnements[] = $detailsApprovisionnement;
            $detailsApprovisionnement->setProduit($this);
        }

        return $this;
    }

    public function removeDetailsApprovisionnement(DetailsApprovisionnement $detailsApprovisionnement): self
    {
        if ($this->detailsApprovisionnements->contains($detailsApprovisionnement)) {
            $this->detailsApprovisionnements->removeElement($detailsApprovisionnement);
            // set the owning side to null (unless already changed)
            if ($detailsApprovisionnement->getProduit() === $this) {
                $detailsApprovisionnement->setProduit(null);
            }
        }

        return $this;
    }
}
