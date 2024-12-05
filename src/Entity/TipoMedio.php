<?php

namespace App\Entity;

use App\Repository\TipoMedioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoMedioRepository::class)]
class TipoMedio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nombre_medio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreMedio(): ?string
    {
        return $this->nombre_medio;
    }

    public function setNombreMedio(string $nombre_medio): static
    {
        $this->nombre_medio = $nombre_medio;

        return $this;
    }
}
