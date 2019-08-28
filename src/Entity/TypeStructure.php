<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeStructureRepository")
 */
class TypeStructure
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
    private $libType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Structure", mappedBy="typeStructure")
     */
    private $structures;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TypeStructure")
     */
    private $hrch;

    public function __construct()
    {
        $this->structures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibType(): ?string
    {
        return $this->libType;
    }

    public function setLibType(string $libType): self
    {
        $this->libType = $libType;

        return $this;
    }

    /**
     * @return Collection|Structure[]
     */
    public function getStructures(): Collection
    {
        return $this->structures;
    }

    public function addStructure(Structure $structure): self
    {
        if (!$this->structures->contains($structure)) {
            $this->structures[] = $structure;
            $structure->setTypeStructure($this);
        }

        return $this;
    }

    public function removeStructure(Structure $structure): self
    {
        if ($this->structures->contains($structure)) {
            $this->structures->removeElement($structure);
            // set the owning side to null (unless already changed)
            if ($structure->getTypeStructure() === $this) {
                $structure->setTypeStructure(null);
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
