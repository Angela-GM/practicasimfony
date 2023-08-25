<?php

namespace App\Entity;

use App\Repository\TipoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoRepository::class)]
class Tipo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $tipo = null;

    #[ORM\OneToMany(mappedBy: 'tipo', targetEntity: Proveedor::class)]
    private Collection $proveedor;

    public function __construct()
    {
        $this->proveedor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @return Collection<int, Proveedor>
     */
    public function getProveedor(): Collection
    {
        return $this->proveedor;
    }

    public function addProveedor(Proveedor $proveedor): static
    {
        if (!$this->proveedor->contains($proveedor)) {
            $this->proveedor->add($proveedor);
            $proveedor->setTipo($this);
        }

        return $this;
    }

    public function removeProveedor(Proveedor $proveedor): static
    {
        if ($this->proveedor->removeElement($proveedor)) {
            // set the owning side to null (unless already changed)
            if ($proveedor->getTipo() === $this) {
                $proveedor->setTipo(null);
            }
        }

        return $this;
    }
}
