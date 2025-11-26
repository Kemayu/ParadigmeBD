<?php

namespace doctrine\core\entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use doctrine\core\entities\Specialite;

class MotifVisite
{
    protected int $id;
    protected string $libelle;

    protected Specialite $specialite;
    protected Collection $praticien;

    public function __construct(string $libelle, Specialite $specialite)
    {
        $this->praticien = new ArrayCollection();
        $this->libelle = $libelle;
        $this->specialite = $specialite;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }
    public function setSpecialite(Specialite $specialite): void
    {
        $this->specialite = $specialite;
    }
        public function setPraticien(Collection $praticien): void
    {
        $this->praticien = $praticien;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getLibelle(): string
    {
        return $this->libelle;
    }
    public function getSpecialite(): Specialite
    {
        return $this->specialite;
    }
        public function getPraticien(): Collection
    {
        return $this->praticien;
    }
}
