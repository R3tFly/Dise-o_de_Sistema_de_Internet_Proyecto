<?php

namespace App\Entity;

use App\Repository\TipoUsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoUsuarioRepository::class)]
class TipoUsuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nombre_tipo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreTipo(): ?string
    {
        return $this->nombre_tipo;
    }

    public function setNombreTipo(string $nombre_tipo): static
    {
        $this->nombre_tipo = $nombre_tipo;

        return $this;
    }
}
