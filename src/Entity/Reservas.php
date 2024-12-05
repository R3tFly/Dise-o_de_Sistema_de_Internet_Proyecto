<?php

namespace App\Entity;

use App\Repository\ReservasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservasRepository::class)]
class Reservas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column(length: 30)]
    private ?string $estado = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hora_inicio = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hora_final = null;

    #[ORM\ManyToOne(targetEntity: Usuariouni::class)]
    #[ORM\JoinColumn(nullable: false)] // Hace que esta relación sea obligatoria
    private ?Usuariouni $usuario = null;

    #[ORM\ManyToOne(targetEntity: Medios::class)]
    #[ORM\JoinColumn(nullable: false)] // Permite valores nulos en caso de que no siempre haya un medio
    private ?Medios $medios = null;

    #[ORM\ManyToOne(targetEntity: Aulas::class)]
    #[ORM\JoinColumn(nullable: false)] // Permite valores nulos
    private ?Aulas $aulas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getHoraInicio(): ?\DateTimeInterface
    {
        return $this->hora_inicio;
    }

    public function setHoraInicio(\DateTimeInterface $hora_inicio): static
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    public function getHoraFinal(): ?\DateTimeInterface
    {
        return $this->hora_final;
    }

    public function setHoraFinal(\DateTimeInterface $hora_final): static
    {
        $this->hora_final = $hora_final;

        return $this;
    }

    public function getUsuario(): ?Usuariouni
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuariouni $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getMedios(): ?Medios
    {
        return $this->medios;
    }

    public function setMedios(?Medios $medios): static
    {
        $this->medios = $medios;

        return $this;
    }

    public function getAulas(): ?Aulas
    {
        return $this->aulas;
    }

    public function setAulas(?Aulas $aulas): static
    {
        $this->aulas = $aulas;

        return $this;
    }
}
