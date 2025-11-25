<?php

namespace core\domain;

use core\domain\Specialite;

class Praticien
{
    private string $id;
    private string $nom;
    private string $rpp_id;
    private Specialite $specialite;

    private string $prenom;
    private string $titre;
    private string $ville;
    private string $email;
    private string $telephone;
    private bool $organisation;
    private bool $accepte_nouveau_patient;
    public function __construct(string $titre)
    {
        $this->titre = $titre;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function getTitre(): string
    {
        return $this->titre;
    }
}
