<?php

namespace doctrine\core\entities;

use Doctrine\Common\Collections\ArrayCollection;
use doctrine\core\entities\Specialite;
use doctrine\core\entities\Structure;
use Doctrine\Common\Collections\Collection;

class Praticien
{
    protected string $id;
    protected string $nom;
    protected string $rpps_id;
    protected Specialite $specialite;
    protected Structure $structure;
    protected Collection $moyenPaiements;
    protected Collection $motifvisites;

    protected string $prenom;
    protected string $titre;
    protected string $ville;
    protected string $email;
    protected string $telephone;
    protected bool $organisation;
    protected bool $nouveau_patient;
    public function __construct(Specialite $specialite, Structure $structure, string $nom, string $rpps_id, string $prenom, string $titre, string $ville, string $email, string $telephone, bool $organisation, bool $nouveau_patient)
    {
        $this->moyenPaiements = new ArrayCollection();
        $this->motifvisites = new ArrayCollection();
        $this->specialite = $specialite;
        $this->structure = $structure;
        $this->nom = $nom;
        $this->rpps_id = $rpps_id;
        $this->prenom = $prenom;
        $this->titre = $titre;
        $this->ville = $ville;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->organisation = $organisation;
        $this->nouveau_patient = $nouveau_patient;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    public function setSpecialite(Specialite $specialite): void
    {
        $this->specialite = $specialite;
    }
    public function setStructure(Structure $structure): void
    {
        $this->structure = $structure;
    }
    public function setMoyenPaiement(Collection $moyenPaiements): void
    {
        $this->moyenPaiements = $moyenPaiements;
    }
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setRpps_id(string $rpps_id): void
    {
        $this->rpps_id = $rpps_id;
    }
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function setOrganisation(bool $organisation): void
    {
        $this->organisation = $organisation;
    }
    public function setAcceptClient(bool $nouveau_patient): void
    {
        $this->nouveau_patient = $nouveau_patient;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getSpecialite(): Specialite
    {
        return $this->specialite;
    }
    public function getMotifVisite(): Collection
    {
        return $this->motifvisites;
    }
    public function getMoyenPaiement(): Collection
    {
        return $this->moyenPaiements;
    }
    public function getStructure(): Structure
    {
        return $this->structure;
    }


    public function getTitre(): string
    {
        return $this->titre;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function getVille(): string
    {
        return $this->ville;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getTelephone(): string
    {
        return $this->telephone;
    }
}
