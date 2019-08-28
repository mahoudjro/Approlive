<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailsApprovisionnementRepository")
 */
class DetailsApprovisionnement
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
    private $qteAppro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="detailsApprovisionnements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Approvisionnement", inversedBy="detailsApprovisionnements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $approvisionnement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteAppro(): ?int
    {
        return $this->qteAppro;
    }

    public function setQteAppro(int $qteAppro): self
    {
        $this->qteAppro = $qteAppro;

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

    public function getApprovisionnement(): ?Approvisionnement
    {
        return $this->approvisionnement;
    }

    public function setApprovisionnement(?Approvisionnement $approvisionnement): self
    {
        $this->approvisionnement = $approvisionnement;

        return $this;
    }
}
