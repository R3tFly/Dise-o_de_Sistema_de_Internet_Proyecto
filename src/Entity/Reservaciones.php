<?php

namespace App\Entity;

use App\Repository\ReservacionesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservacionesRepository::class)]
class Reservaciones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    public ?Usuariouni $usuario_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    public ?Medios $medios_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    public ?Aulas $aulas_id = null;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuarioId(): ?usuariouni
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(?usuariouni $usuario_id): static
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function getMediosId(): ?medios
    {
        return $this->medios_id;
    }

    public function setMediosId(?medios $medios_id): static
    {
        $this->medios_id = $medios_id;

        return $this;
    }

    public function getAulasId(): ?aulas
    {
        return $this->aulas_id;
    }

    public function setAulasId(?aulas $aulas_id): static
    {
        $this->aulas_id = $aulas_id;

        return $this;
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
}
