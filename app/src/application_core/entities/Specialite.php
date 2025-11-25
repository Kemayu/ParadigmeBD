<?php

namespace doctrine\core\entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
class Specialite
{
    protected int $id;
    protected Collection $motifvisites;
    protected Collection $praticiens;
    protected string $libelle;

    protected string $description;


    public function __construct(string $libelle, string $description)
    {
        $this->praticiens = new ArrayCollection();
        $this->motifvisites = new ArrayCollection();
        $this->libelle = $libelle;
        $this->description = $description;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setMotifVisite(Collection $motifvisite): void
    {
        $this->motifvisites = $motifvisite;
    }

    public function setPraticien(Collection $praticien): void
    {
        $this->praticiens = $praticien;
    }

    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }
        public function getPraticien(): Collection
    {
        return $this->praticiens;
    }
        public function getMotifVisite(): Collection
    {
        return $this->motifvisites;
    }
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
