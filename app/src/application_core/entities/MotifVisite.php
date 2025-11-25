<?php

namespace doctrine\core\entities;

use doctrine\core\entities\Specialite;

class MotifVisite
{
    protected int $id;
    protected string $libelle;

    protected Specialite $specialite;

    public function __construct(string $libelle, Specialite $specialite)
    {
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
}
