<?php

namespace App\Entity;

use App\Repository\MediosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediosRepository::class)]
class Medios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   

    #[ORM\Column]
    private ?int $cantidad = null;

    #[ORM\ManyToOne(targetEntity: TipoMedio::class)]
    #[ORM\JoinColumn(name: 'tipo_medio_id_id', referencedColumnName: 'id')]
    public ?TipoMedio $tipo_medio_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getTipoMedioId(): ?TipoMedio
    {
        return $this->tipo_medio_id;
    }

    public function setTipoMedioId(?TipoMedio $tipo_medio_id): static
    {
        $this->tipo_medio_id = $tipo_medio_id;

        return $this;
    }
}
