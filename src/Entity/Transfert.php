<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransfertRepository")
 */
class Transfert
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
    private $dateTrans;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $refTrans;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure", inversedBy="transferts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $structureDepart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $structureArrive;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailsTransfert", mappedBy="transfert")
     */
    private $detailsTransferts;

    public function __construct()
    {
        $this->detailsTransferts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTrans(): ?\DateTimeInterface
    {
        return $this->dateTrans;
    }

    public function setDateTrans(\DateTimeInterface $dateTrans): self
    {
        $this->dateTrans = $dateTrans;

        return $this;
    }

    public function getRefTrans(): ?int
    {
        return $this->refTrans;
    }

    public function setRefTrans(int $refTrans): self
    {
        $this->refTrans = $refTrans;

        return $this;
    }

    public function getStructureDepart(): ?Structure
    {
        return $this->structureDepart;
    }

    public function setStructureDepart(?Structure $structureDepart): self
    {
        $this->structureDepart = $structureDepart;

        return $this;
    }

    public function getStructureArrive(): ?Structure
    {
        return $this->structureArrive;
    }

    public function setStructureArrive(?Structure $structureArrive): self
    {
        $this->structureArrive = $structureArrive;

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
            $detailsTransfert->setTransfert($this);
        }

        return $this;
    }

    public function removeDetailsTransfert(DetailsTransfert $detailsTransfert): self
    {
        if ($this->detailsTransferts->contains($detailsTransfert)) {
            $this->detailsTransferts->removeElement($detailsTransfert);
            // set the owning side to null (unless already changed)
            if ($detailsTransfert->getTransfert() === $this) {
                $detailsTransfert->setTransfert(null);
            }
        }

        return $this;
    }

}
