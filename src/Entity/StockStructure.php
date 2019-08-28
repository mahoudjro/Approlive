<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="stock_structure", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_Stock_Outil", columns={"structure_id", "produit_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\StockStructureRepository")
 * @UniqueEntity(fields={"structure","produit"}, message="Le stock outil est déjà enregistré pour la structure et le produit sélectionnés.")
 */
class StockStructure
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
    private $stock_outil;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure", inversedBy="stockStructures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $structure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="stockStructures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStockOutil(): ?int
    {
        return $this->stock_outil;
    }

    public function setStockOutil(int $stock_outil): self
    {
        $this->stock_outil = $stock_outil;

        return $this;
    }

    public function getStructure(): ?Structure
    {
        return $this->structure;
    }

    public function setStructure(?Structure $structure): self
    {
        $this->structure = $structure;

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
