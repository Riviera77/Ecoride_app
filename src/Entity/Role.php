<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class)]
    private Collection $role_utilisateur;

    public function __construct()
    {
        $this->role_utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getRoleUtilisateur(): Collection
    {
        return $this->role_utilisateur;
    }

    public function addRoleUtilisateur(User $roleUtilisateur): static
    {
        if (!$this->role_utilisateur->contains($roleUtilisateur)) {
            $this->role_utilisateur->add($roleUtilisateur);
        }

        return $this;
    }

    public function removeRoleUtilisateur(User $roleUtilisateur): static
    {
        $this->role_utilisateur->removeElement($roleUtilisateur);

        return $this;
    }
}
