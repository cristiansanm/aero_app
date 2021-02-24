<?php

namespace App\Entity;

use App\Repository\BasesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasesRepository::class)
 */
class Bases
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Aviones::class, mappedBy="baseavion")
     */
    private $avionEnBase;

    /**
     * @ORM\OneToMany(targetEntity=Personal::class, mappedBy="basepersonal")
     */
    private $personalEnBase;

    public function __construct()
    {
        $this->avionEnBase = new ArrayCollection();
        $this->personalEnBase = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Aviones[]
     */
    public function getAvionEnBase(): Collection
    {
        return $this->avionEnBase;
    }

    public function addAvionEnBase(Aviones $avionEnBase): self
    {
        if (!$this->avionEnBase->contains($avionEnBase)) {
            $this->avionEnBase[] = $avionEnBase;
            $avionEnBase->setBaseavion($this);
        }

        return $this;
    }

    public function removeAvionEnBase(Aviones $avionEnBase): self
    {
        if ($this->avionEnBase->removeElement($avionEnBase)) {
            // set the owning side to null (unless already changed)
            if ($avionEnBase->getBaseavion() === $this) {
                $avionEnBase->setBaseavion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Personal[]
     */
    public function getPersonalEnBase(): Collection
    {
        return $this->personalEnBase;
    }

    public function addPersonalEnBase(Personal $personalEnBase): self
    {
        if (!$this->personalEnBase->contains($personalEnBase)) {
            $this->personalEnBase[] = $personalEnBase;
            $personalEnBase->setBasepersonal($this);
        }

        return $this;
    }

    public function removePersonalEnBase(Personal $personalEnBase): self
    {
        if ($this->personalEnBase->removeElement($personalEnBase)) {
            // set the owning side to null (unless already changed)
            if ($personalEnBase->getBasepersonal() === $this) {
                $personalEnBase->setBasepersonal(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return (string) $this->getId();
    }
}
