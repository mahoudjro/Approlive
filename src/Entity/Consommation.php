<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsommationRepository")
 */
class Consommation
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
    private $dateCons;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $refCons;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure", inversedBy="consommations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $structure;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailsConsommation", mappedBy="consommation")
     */
    private $detailsConsommations;

    public function __construct()
    {
        $this->detailsConsommations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCons(): ?\DateTimeInterface
    {
        return $this->dateCons;
    }

    public function setDateCons(\DateTimeInterface $dateCons): self
    {
        $this->dateCons = $dateCons;

        return $this;
    }

    public function getRefCons(): ?int
    {
        return $this->refCons;
    }

    public function setRefCons(int $refCons): self
    {
        $this->refCons = $refCons;

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
            $detailsConsommation->setConsommation($this);
        }

        return $this;
    }

    public function removeDetailsConsommation(DetailsConsommation $detailsConsommation): self
    {
        if ($this->detailsConsommations->contains($detailsConsommation)) {
            $this->detailsConsommations->removeElement($detailsConsommation);
            // set the owning side to null (unless already changed)
            if ($detailsConsommation->getConsommation() === $this) {
                $detailsConsommation->setConsommation(null);
            }
        }

        return $this;
    }
}
