<?php

namespace App\Entity;

use App\Repository\VuelosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VuelosRepository::class)
 */
class Vuelos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="time")
     */
    private $hora;

    /**
     * @ORM\ManyToOne(targetEntity=Ciudades::class, inversedBy="ciudadOrigen")
     */
    private $origen;

    /**
     * @ORM\ManyToOne(targetEntity=Ciudades::class, inversedBy="ciudadDestino")
     */
    private $destino;

    /**
     * @ORM\ManyToOne(targetEntity=Aviones::class, inversedBy="avionEnVuelo")
     */
    private $avion;

    /**
     * @ORM\OneToMany(targetEntity=VuelosPersonal::class, mappedBy="vueloId")
     */
    private $vueloPerId;

    public function __construct()
    {
        $this->vueloPerId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getOrigen(): ?Ciudades
    {
        return $this->origen;
    }

    public function setOrigen(?Ciudades $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?Ciudades
    {
        return $this->destino;
    }

    public function setDestino(?Ciudades $destino): self
    {
        $this->destino = $destino;

        return $this;
    }

    public function getAvion(): ?Aviones
    {
        return $this->avion;
    }

    public function setAvion(?Aviones $avion): self
    {
        $this->avion = $avion;

        return $this;
    }

    /**
     * @return Collection|VuelosPersonal[]
     */
    public function getVueloPerId(): Collection
    {
        return $this->vueloPerId;
    }

    public function addVueloPerId(VuelosPersonal $vueloPerId): self
    {
        if (!$this->vueloPerId->contains($vueloPerId)) {
            $this->vueloPerId[] = $vueloPerId;
            $vueloPerId->setVueloId($this);
        }

        return $this;
    }

    public function removeVueloPerId(VuelosPersonal $vueloPerId): self
    {
        if ($this->vueloPerId->removeElement($vueloPerId)) {
            // set the owning side to null (unless already changed)
            if ($vueloPerId->getVueloId() === $this) {
                $vueloPerId->setVueloId(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
        return (string) $this->getId();
    }
}
