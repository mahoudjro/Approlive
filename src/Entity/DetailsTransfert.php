<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailsTransfertRepository")
 */
class DetailsTransfert
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
    private $qteTrans;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="detailsTransferts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Transfert", inversedBy="detailsTransferts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transfert;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteTrans(): ?int
    {
        return $this->qteTrans;
    }

    public function setQteTrans(int $qteTrans): self
    {
        $this->qteTrans = $qteTrans;

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

    public function getTransfert(): ?Transfert
    {
        return $this->transfert;
    }

    public function setTransfert(?Transfert $transfert): self
    {
        $this->transfert = $transfert;

        return $this;
    }
}
