<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StructureRepository")
 */
class Structure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $libStr;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $telStr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseStr;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeStructure", inversedBy="structures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeStructure;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StockStructure", mappedBy="structure")
     */
    private $stockStructures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Consommation", mappedBy="structure")
     */
    private $consommations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Approvisionnement", mappedBy="structure")
     */
    private $approvisionnements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transfert", mappedBy="structureDepart")
     */
    private $transferts;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure")
     */
    private $hrch;

    public function __construct()
    {
        $this->stockStructures = new ArrayCollection();
        $this->consommations = new ArrayCollection();
        $this->approvisionnements = new ArrayCollection();
        $this->transferts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibStr(): ?string
    {
        return $this->libStr;
    }

    public function setLibStr(string $libStr): self
    {
        $this->libStr = $libStr;

        return $this;
    }

    public function getTelStr(): ?int
    {
        return $this->telStr;
    }

    public function setTelStr(int $telStr): self
    {
        $this->telStr = $telStr;

        return $this;
    }

    public function getAdresseStr(): ?string
    {
        return $this->adresseStr;
    }

    public function setAdresseStr(string $adresseStr): self
    {
        $this->adresseStr = $adresseStr;

        return $this;
    }

    public function getTypeStructure(): ?TypeStructure
    {
        return $this->typeStructure;
    }

    public function setTypeStructure(?TypeStructure $typeStructure): self
    {
        $this->typeStructure = $typeStructure;

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
            $stockStructure->setStructure($this);
        }

        return $this;
    }

    public function removeStockStructure(StockStructure $stockStructure): self
    {
        if ($this->stockStructures->contains($stockStructure)) {
            $this->stockStructures->removeElement($stockStructure);
            // set the owning side to null (unless already changed)
            if ($stockStructure->getStructure() === $this) {
                $stockStructure->setStructure(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Consommation[]
     */
    public function getConsommations(): Collection
    {
        return $this->consommations;
    }

    public function addConsommation(Consommation $consommation): self
    {
        if (!$this->consommations->contains($consommation)) {
            $this->consommations[] = $consommation;
            $consommation->setStructure($this);
        }

        return $this;
    }

    public function removeConsommation(Consommation $consommation): self
    {
        if ($this->consommations->contains($consommation)) {
            $this->consommations->removeElement($consommation);
            // set the owning side to null (unless already changed)
            if ($consommation->getStructure() === $this) {
                $consommation->setStructure(null);
            }
        }

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
            $approvisionnement->setStructure($this);
        }

        return $this;
    }

    public function removeApprovisionnement(Approvisionnement $approvisionnement): self
    {
        if ($this->approvisionnements->contains($approvisionnement)) {
            $this->approvisionnements->removeElement($approvisionnement);
            // set the owning side to null (unless already changed)
            if ($approvisionnement->getStructure() === $this) {
                $approvisionnement->setStructure(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transfert[]
     */
    public function getTransferts(): Collection
    {
        return $this->transferts;
    }

    public function addTransfert(Transfert $transfert): self
    {
        if (!$this->transferts->contains($transfert)) {
            $this->transferts[] = $transfert;
            $transfert->setStructureDepart($this);
        }

        return $this;
    }

    public function removeTransfert(Transfert $transfert): self
    {
        if ($this->transferts->contains($transfert)) {
            $this->transferts->removeElement($transfert);
            // set the owning side to null (unless already changed)
            if ($transfert->getStructureDepart() === $this) {
                $transfert->setStructureDepart(null);
            }
        }

        return $this;
    }

    public function getHrch(): ?self
    {
        return $this->hrch;
    }

    public function setHrch(?self $hrch): self
    {
        $this->hrch = $hrch;

        return $this;
    }
}
