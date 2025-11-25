<?php

namespace doctrine\core\entities;

use Doctrine\Common\Collections\Collection;
class Structure
{
    protected string $id;
    protected string $nom;
    protected string $adresse;
    protected string $ville;
    protected Collection $praticien;
    protected string $code_postal;
    protected string $telephone;
    public function __construct(Collection $praticien,string $nom, string $adresse, string $ville, string $code_postal, string $telephone)
    {
        $this->praticien = $praticien;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->code_postal = $code_postal;
        $this->telephone = $telephone;

    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    public function setPraticien(Collection $praticien): void
    {
        $this->praticien = $praticien;
    }

    public function setCodePostal(string $code_postal): void
    {
        $this->code_postal = $code_postal;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
        public function getAdresse(): string
    {
        return $this->adresse;
    }
        public function getVille(): string
    {
        return $this->ville;
    }
        public function getCodePostal(): string
    {
        return $this->code_postal;
    }
        public function getTelephone(): string
    {
        return $this->telephone;
    }

}
