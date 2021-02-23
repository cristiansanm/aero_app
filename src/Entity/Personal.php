<?php

namespace App\Entity;

use App\Repository\PersonalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonalRepository::class)
 */
class Personal
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
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\ManyToOne(targetEntity=Funciones::class, inversedBy="personalFuncion")
     */
    private $funcion;

    /**
     * @ORM\ManyToOne(targetEntity=Bases::class, inversedBy="personalEnBase")
     */
    private $basepersonal;

    /**
     * @ORM\OneToMany(targetEntity=VuelosPersonal::class, mappedBy="piloto")
     */
    private $pilotoId;

    /**
     * @ORM\OneToMany(targetEntity=VuelosPersonal::class, mappedBy="copiloto")
     */
    private $copilotoId;

    /**
     * @ORM\OneToMany(targetEntity=VuelosPersonal::class, mappedBy="ingeniero")
     */
    private $ingenieroId;

    /**
     * @ORM\OneToMany(targetEntity=VuelosPersonal::class, mappedBy="auxiliar")
     */
    private $auxiliarId;


    public function __construct()
    {
        $this->pilotoId = new ArrayCollection();
        $this->copilotoId = new ArrayCollection();
        $this->ingenieroId = new ArrayCollection();
        $this->auxiliarId = new ArrayCollection();
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getFuncion(): ?Funciones
    {
        return $this->funcion;
    }

    public function setFuncion(?Funciones $funcion): self
    {
        $this->funcion = $funcion;

        return $this;
    }

    public function getBasepersonal(): ?Bases
    {
        return $this->basepersonal;
    }

    public function setBasepersonal(?Bases $basepersonal): self
    {
        $this->basepersonal = $basepersonal;

        return $this;
    }

    /**
     * @return Collection|VuelosPersonal[]
     */
    public function getPilotoId(): Collection
    {
        return $this->pilotoId;
    }

    public function addPilotoId(VuelosPersonal $pilotoId): self
    {
        if (!$this->pilotoId->contains($pilotoId)) {
            $this->pilotoId[] = $pilotoId;
            $pilotoId->setPiloto($this);
        }

        return $this;
    }

    public function removePilotoId(VuelosPersonal $pilotoId): self
    {
        if ($this->pilotoId->removeElement($pilotoId)) {
            // set the owning side to null (unless already changed)
            if ($pilotoId->getPiloto() === $this) {
                $pilotoId->setPiloto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VuelosPersonal[]
     */
    public function getCopilotoId(): Collection
    {
        return $this->copilotoId;
    }

    public function addCopilotoId(VuelosPersonal $copilotoId): self
    {
        if (!$this->copilotoId->contains($copilotoId)) {
            $this->copilotoId[] = $copilotoId;
            $copilotoId->setCopiloto($this);
        }

        return $this;
    }

    public function removeCopilotoId(VuelosPersonal $copilotoId): self
    {
        if ($this->copilotoId->removeElement($copilotoId)) {
            // set the owning side to null (unless already changed)
            if ($copilotoId->getCopiloto() === $this) {
                $copilotoId->setCopiloto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VuelosPersonal[]
     */
    public function getIngenieroId(): Collection
    {
        return $this->ingenieroId;
    }

    public function addIngenieroId(VuelosPersonal $ingenieroId): self
    {
        if (!$this->ingenieroId->contains($ingenieroId)) {
            $this->ingenieroId[] = $ingenieroId;
            $ingenieroId->setIngeniero($this);
        }

        return $this;
    }

    public function removeIngenieroId(VuelosPersonal $ingenieroId): self
    {
        if ($this->ingenieroId->removeElement($ingenieroId)) {
            // set the owning side to null (unless already changed)
            if ($ingenieroId->getIngeniero() === $this) {
                $ingenieroId->setIngeniero(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VuelosPersonal[]
     */
    public function getAuxiliarId(): Collection
    {
        return $this->auxiliarId;
    }

    public function addAuxiliarId(VuelosPersonal $auxiliarId): self
    {
        if (!$this->auxiliarId->contains($auxiliarId)) {
            $this->auxiliarId[] = $auxiliarId;
            $auxiliarId->setAuxiliar($this);
        }

        return $this;
    }

    public function removeAuxiliarId(VuelosPersonal $auxiliarId): self
    {
        if ($this->auxiliarId->removeElement($auxiliarId)) {
            // set the owning side to null (unless already changed)
            if ($auxiliarId->getAuxiliar() === $this) {
                $auxiliarId->setAuxiliar(null);
            }
        }

        return $this;
    }

    
}
