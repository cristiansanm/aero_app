<?php

namespace App\Entity;

use App\Repository\AvionesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvionesRepository::class)
 */
class Aviones
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
    private $tipo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    /**
     * @ORM\ManyToOne(targetEntity=Bases::class, inversedBy="avionEnBase")
     */
    private $baseavion;

    /**
     * @ORM\OneToMany(targetEntity=Vuelos::class, mappedBy="avion")
     */
    private $avionEnVuelo;

    public function __construct()
    {
        $this->avionEnVuelo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getBaseavion(): ?Bases
    {
        return $this->baseavion;
    }

    public function setBaseavion(?Bases $baseavion): self
    {
        $this->baseavion = $baseavion;

        return $this;
    }

    /**
     * @return Collection|Vuelos[]
     */
    public function getAvionEnVuelo(): Collection
    {
        return $this->avionEnVuelo;
    }

    public function addAvionEnVuelo(Vuelos $avionEnVuelo): self
    {
        if (!$this->avionEnVuelo->contains($avionEnVuelo)) {
            $this->avionEnVuelo[] = $avionEnVuelo;
            $avionEnVuelo->setAvion($this);
        }

        return $this;
    }

    public function removeAvionEnVuelo(Vuelos $avionEnVuelo): self
    {
        if ($this->avionEnVuelo->removeElement($avionEnVuelo)) {
            // set the owning side to null (unless already changed)
            if ($avionEnVuelo->getAvion() === $this) {
                $avionEnVuelo->setAvion(null);
            }
        }

        return $this;
    }
}
