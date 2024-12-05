<?php

namespace App\Entity;

use App\Repository\AulasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AulasRepository::class)]
class Aulas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $codigo = null;

    #[ORM\Column(length: 30)]
    private ?string $pabellon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): static
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getPabellon(): ?string
    {
        return $this->pabellon;
    }

    public function setPabellon(string $pabellon): static
    {
        $this->pabellon = $pabellon;

        return $this;
    }
}
