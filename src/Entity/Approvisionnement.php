<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApprovisionnementRepository")
 */
class Approvisionnement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAppro;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $refAppro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure", inversedBy="approvisionnements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $structure;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailsApprovisionnement", mappedBy="approvisionnement")
     */
    private $detailsApprovisionnements;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fournisseur", inversedBy="approvisionnements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    public function __construct()
    {
        $this->detailsApprovisionnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAppro(): ?\DateTimeInterface
    {
        return $this->dateAppro;
    }

    public function setDateAppro(\DateTimeInterface $dateAppro): self
    {
        $this->dateAppro = $dateAppro;

        return $this;
    }

    public function getRefAppro(): ?int
    {
        return $this->refAppro;
    }

    public function setRefAppro(int $refAppro): self
    {
        $this->refAppro = $refAppro;

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
            $detailsApprovisionnement->setApprovisionnement($this);
        }

        return $this;
    }

    public function removeDetailsApprovisionnement(DetailsApprovisionnement $detailsApprovisionnement): self
    {
        if ($this->detailsApprovisionnements->contains($detailsApprovisionnement)) {
            $this->detailsApprovisionnements->removeElement($detailsApprovisionnement);
            // set the owning side to null (unless already changed)
            if ($detailsApprovisionnement->getApprovisionnement() === $this) {
                $detailsApprovisionnement->setApprovisionnement(null);
            }
        }

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }
}
