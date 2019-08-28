<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FournisseurRepository")
 */
class Fournisseur
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
    private $libFour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telFour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseFour;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Approvisionnement", mappedBy="fournisseur")
     */
    private $approvisionnements;

    public function __construct()
    {
        $this->approvisionnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibFour(): ?string
    {
        return $this->libFour;
    }

    public function setLibFour(string $libFour): self
    {
        $this->libFour = $libFour;

        return $this;
    }

    public function getTelFour(): ?string
    {
        return $this->telFour;
    }

    public function setTelFour(string $telFour): self
    {
        $this->telFour = $telFour;

        return $this;
    }

    public function getAdresseFour(): ?string
    {
        return $this->adresseFour;
    }

    public function setAdresseFour(string $adresseFour): self
    {
        $this->adresseFour = $adresseFour;

        return $this;
    }

    /**
     * @return Collection|Approvisionnement[]
     */
    public function getApprovisionnements(): Collection
    {
        return $this->approvisionnements;
    }

    public function addApprovisionnement(Approvisionnement $approvisionnement): self
    {
        if (!$this->approvisionnements->contains($approvisionnement)) {
            $this->approvisionnements[] = $approvisionnement;
            $approvisionnement->setFournisseur($this);
        }

        return $this;
    }

    public function removeApprovisionnement(Approvisionnement $approvisionnement): self
    {
        if ($this->approvisionnements->contains($approvisionnement)) {
            $this->approvisionnements->removeElement($approvisionnement);
            // set the owning side to null (unless already changed)
            if ($approvisionnement->getFournisseur() === $this) {
                $approvisionnement->setFournisseur(null);
            }
        }

        return $this;
    }
}
