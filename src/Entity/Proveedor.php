<?php

namespace App\Entity;

use App\Repository\ProveedorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProveedorRepository::class)]
class Proveedor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(length: 45)]
    private ?string $correo = null;

    #[ORM\Column(length: 45)]
    private ?string $telefono = null;

    #[ORM\Column]
    private ?bool $activo = true;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_creacion = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_actualizacion = null;

    #[ORM\ManyToOne(inversedBy: 'proveedor', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tipo $tipo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): static
    {
        $this->correo = $correo;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fecha_creacion): static
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    public function getFechaActualizacion(): ?\DateTimeInterface
    {
        return $this->fecha_actualizacion;
    }

    public function setFechaActualizacion(\DateTimeInterface $fecha_actualizacion): static
    {
        $this->fecha_actualizacion = $fecha_actualizacion;

        return $this;
    }

    public function getTipo(): ?Tipo
    {
        return $this->tipo;
    }

    public function setTipo(?Tipo $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }
}
