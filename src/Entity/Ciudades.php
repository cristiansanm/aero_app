<?php

namespace App\Entity;

use App\Repository\CiudadesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CiudadesRepository::class)
 */
class Ciudades
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
     * @ORM\OneToMany(targetEntity=Vuelos::class, mappedBy="origen")
     */
    private $ciudadOrigen;

    /**
     * @ORM\OneToMany(targetEntity=Vuelos::class, mappedBy="destino")
     */
    private $ciudadDestino;

    public function __construct()
    {
        $this->ciudadOrigen = new ArrayCollection();
        $this->ciudadDestino = new ArrayCollection();
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
     * @return Collection|Vuelos[]
     */
    public function getCiudadOrigen(): Collection
    {
        return $this->ciudadOrigen;
    }

    public function addCiudadOrigen(Vuelos $ciudadOrigen): self
    {
        if (!$this->ciudadOrigen->contains($ciudadOrigen)) {
            $this->ciudadOrigen[] = $ciudadOrigen;
            $ciudadOrigen->setOrigen($this);
        }

        return $this;
    }

    public function removeCiudadOrigen(Vuelos $ciudadOrigen): self
    {
        if ($this->ciudadOrigen->removeElement($ciudadOrigen)) {
            // set the owning side to null (unless already changed)
            if ($ciudadOrigen->getOrigen() === $this) {
                $ciudadOrigen->setOrigen(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vuelos[]
     */
    public function getCiudadDestino(): Collection
    {
        return $this->ciudadDestino;
    }

    public function addCiudadDestino(Vuelos $ciudadDestino): self
    {
        if (!$this->ciudadDestino->contains($ciudadDestino)) {
            $this->ciudadDestino[] = $ciudadDestino;
            $ciudadDestino->setDestino($this);
        }

        return $this;
    }

    public function removeCiudadDestino(Vuelos $ciudadDestino): self
    {
        if ($this->ciudadDestino->removeElement($ciudadDestino)) {
            // set the owning side to null (unless already changed)
            if ($ciudadDestino->getDestino() === $this) {
                $ciudadDestino->setDestino(null);
            }
        }

        return $this;
    }
}
