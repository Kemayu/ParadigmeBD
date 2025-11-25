<?php

namespace doctrine\core\entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
class MoyenPaiement
{
    protected int $id;
    protected string $libelle;

    protected Collection $praticiens;
    

    public function __construct(string $libelle)
    {
        $this->praticiens =  new ArrayCollection();
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
        public function setPraticien(Collection $praticiens): void
    {
        $this->praticiens = $praticiens;
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
        return $this->praticiens;
    }

}
