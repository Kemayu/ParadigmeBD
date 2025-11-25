<?php

namespace core\domain;

class Specialite
{
    private int $id;
    private string $libelle;
    
    private string $description;

    public function __construct(string $libelle, string $description)
    {
        $this->libelle = $libelle;
        $this->description = $description;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
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
