<?php

namespace doctrine\core\entities;
use Doctrine\Common\Collections\Collection;
class Specialite
{
    protected int $id;
    protected Collection $motifvisite;
    protected Collection $praticien;
    protected string $libelle;

    protected string $description;


    public function __construct(Collection $motifvisite, Collection $praticien,string $libelle, string $description)
    {
        $this->motifvisite = $motifvisite;
        $this->praticien = $praticien;
        $this->libelle = $libelle;
        $this->description = $description;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setMotifVisite(Collection $motifvisite): void
    {
        $this->motifvisite = $motifvisite;
    }

    public function setPraticien(Collection $praticien): void
    {
        $this->praticien = $praticien;
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
        return $this->praticien;
    }
        public function getMotifVisite(): Collection
    {
        return $this->motifvisite;
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
