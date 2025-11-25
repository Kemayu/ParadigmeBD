<?php

namespace doctrine\core\entities;
use Doctrine\Common\Collections\Collection;
class MoyenPaiement
{
    protected int $id;
    protected string $libelle;

    protected Collection $praticien;
    

    public function __construct(Collection $praticien,string $libelle)
    {
        $this->praticien = $praticien;
        $this->libelle = $libelle;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
        public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
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
        public function getPraticien(): Collection
    {
        return $this->praticien;
    }

}
