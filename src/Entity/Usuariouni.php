<?php

namespace App\Entity;

use App\Repository\UsuariouniRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsuariouniRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
class Usuariouni implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    // Campos adicionales
    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellido = null;

    // Relación con la tabla tipo_usuario (suponiendo que existe la entidad TipoUsuario)
    #[ORM\ManyToOne(targetEntity: TipoUsuario::class)]
    #[ORM\JoinColumn(name: 'tipo_usuario_id', referencedColumnName: 'id')]
    private ?TipoUsuario $tipoUsuario = null;

    /**
     * @var Collection<int, Reservaciones>
     */
    #[ORM\OneToMany(targetEntity: Reservaciones::class, mappedBy: 'usuario_id')]
    private Collection $reservas;

    public function __construct()
    {
        $this->reservas = new ArrayCollection();
    }

    // Getters y Setters de los nuevos campos

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function eraseCredentials(): void
    {
        // Limpiar cualquier dato temporal o sensible
    }

    // Métodos para los campos adicionales

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function getTipoUsuario(): ?TipoUsuario
    {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario(?TipoUsuario $tipoUsuario): static
    {
        $this->tipoUsuario = $tipoUsuario;
        return $this;
    }

    /**
     * @return Collection<int, Reservaciones>
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reservaciones $reserva): static
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas->add($reserva);
            $reserva->setUsuarioId($this);
        }

        return $this;
    }

    public function removeReserva(Reservaciones $reserva): static
    {
        if ($this->reservas->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getUsuarioId() === $this) {
                $reserva->setUsuarioId(null);
            }
        }

        return $this;
    }
}
