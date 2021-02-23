<?php

namespace App\Entity;

use App\Repository\VuelosPersonalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VuelosPersonalRepository::class)
 */
class VuelosPersonal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Vuelos::class, inversedBy="vueloPerId")
     */
    private $vueloId;

    /**
     * @ORM\ManyToOne(targetEntity=Personal::class, inversedBy="pilotoId")
     */
    private $piloto;

    /**
     * @ORM\ManyToOne(targetEntity=Personal::class, inversedBy="copilotoId")
     */
    private $copiloto;

    /**
     * @ORM\ManyToOne(targetEntity=Personal::class, inversedBy="ingenieroId")
     */
    private $ingeniero;

    /**
     * @ORM\ManyToOne(targetEntity=Personal::class, inversedBy="auxiliarId")
     */
    private $auxiliar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVueloId(): ?Vuelos
    {
        return $this->vueloId;
    }

    public function setVueloId(?Vuelos $vueloId): self
    {
        $this->vueloId = $vueloId;

        return $this;
    }

    public function getPiloto(): ?Personal
    {
        return $this->piloto;
    }

    public function setPiloto(?Personal $piloto): self
    {
        $this->piloto = $piloto;

        return $this;
    }

    public function getCopiloto(): ?Personal
    {
        return $this->copiloto;
    }

    public function setCopiloto(?Personal $copiloto): self
    {
        $this->copiloto = $copiloto;

        return $this;
    }

    public function getIngeniero(): ?Personal
    {
        return $this->ingeniero;
    }

    public function setIngeniero(?Personal $ingeniero): self
    {
        $this->ingeniero = $ingeniero;

        return $this;
    }

    public function getAxuiliar(): ?Personal
    {
        return $this->axuiliar;
    }

    public function setAxuiliar(?Personal $axuiliar): self
    {
        $this->axuiliar = $axuiliar;

        return $this;
    }

    public function getAuxiliar(): ?Personal
    {
        return $this->auxiliar;
    }

    public function setAuxiliar(?Personal $auxiliar): self
    {
        $this->auxiliar = $auxiliar;

        return $this;
    }
}
