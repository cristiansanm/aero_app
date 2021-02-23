<?php

namespace App\Entity;

use App\Repository\FuncionesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FuncionesRepository::class)
 */
class Funciones
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
     * @ORM\OneToMany(targetEntity=Personal::class, mappedBy="funcion")
     */
    private $personalFuncion;

    public function __construct()
    {
        $this->personalFuncion = new ArrayCollection();
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
     * @return Collection|Personal[]
     */
    public function getPersonalFuncion(): Collection
    {
        return $this->personalFuncion;
    }

    public function addPersonalFuncion(Personal $personalFuncion): self
    {
        if (!$this->personalFuncion->contains($personalFuncion)) {
            $this->personalFuncion[] = $personalFuncion;
            $personalFuncion->setFuncion($this);
        }

        return $this;
    }

    public function removePersonalFuncion(Personal $personalFuncion): self
    {
        if ($this->personalFuncion->removeElement($personalFuncion)) {
            // set the owning side to null (unless already changed)
            if ($personalFuncion->getFuncion() === $this) {
                $personalFuncion->setFuncion(null);
            }
        }

        return $this;
    }
}
