<?php

namespace App\Entity;

use App\Repository\CovoiturageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CovoiturageRepository::class)]
class Covoiturage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_depart = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_arrivee = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_depart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_arrivee = null;

    #[ORM\Column]
    private ?float $prix_personne = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure_depart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure_arrivee = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'covoiturages')]
    private Collection $user_covoiturage;

    public function __construct()
    {
        $this->user_covoiturage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseDepart(): ?string
    {
        return $this->adresse_depart;
    }

    public function setAdresseDepart(string $adresse_depart): static
    {
        $this->adresse_depart = $adresse_depart;

        return $this;
    }

    public function getAdresseArrivee(): ?string
    {
        return $this->adresse_arrivee;
    }

    public function setAdresseArrivee(string $adresse_arrivee): static
    {
        $this->adresse_arrivee = $adresse_arrivee;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): static
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTimeInterface $date_arrivee): static
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function getPrixPersonne(): ?float
    {
        return $this->prix_personne;
    }

    public function setPrixPersonne(float $prix_personne): static
    {
        $this->prix_personne = $prix_personne;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heure_depart;
    }

    public function setHeureDepart(\DateTimeInterface $heure_depart): static
    {
        $this->heure_depart = $heure_depart;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTimeInterface
    {
        return $this->heure_arrivee;
    }

    public function setHeureArrivee(\DateTimeInterface $heure_arrivee): static
    {
        $this->heure_arrivee = $heure_arrivee;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserCovoiturage(): Collection
    {
        return $this->user_covoiturage;
    }

    public function addUserCovoiturage(User $userCovoiturage): static
    {
        if (!$this->user_covoiturage->contains($userCovoiturage)) {
            $this->user_covoiturage->add($userCovoiturage);
        }

        return $this;
    }

    public function removeUserCovoiturage(User $userCovoiturage): static
    {
        $this->user_covoiturage->removeElement($userCovoiturage);

        return $this;
    }
}
