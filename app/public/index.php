<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use doctrine\core\entities\Praticien;
use doctrine\core\entities\Specialite;
use doctrine\core\entities\Structure;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Paradigme\Domain\Entities\Spectacle;

try {
    $mapping_path = __DIR__ . '/../src/infrastructure/mapping/';
    $isDevMode = true;
    $dbParams = parse_ini_file(__DIR__ . '/../config/prati.ini');

    $config = ORMSetup::createXMLMetadataConfiguration([$mapping_path], $isDevMode);
    $connection = DriverManager::getConnection($dbParams, $config);
    $entityManager = new EntityManager($connection, $config);

    $structureRepository = $entityManager->getRepository(Structure::class);
    $specialiteRepository = $entityManager->getRepository(Specialite::class);
    $praticienRepository = $entityManager->getRepository( Praticien::class);

    $structures = $structureRepository->findAll();
    $specialites = $specialiteRepository->find(1);
    $praticien = $praticienRepository->find("8ae1400f-d46d-3b50-b356-269f776be532");

    var_dump($praticien);
    if (!empty($specialites)) {

        echo "1) <br> Id : " . $specialites->getId() . "<br> Libelle: " . $specialites->getLibelle()  . "<br> Description : " . $specialites->getDescription();
    }

    if (!empty($praticien)) {

        echo "<br> 2) <br> Id : " . $praticien->getId() . "<br> Nom: " . $praticien->getNom()  . "<br> Prénom : " . $praticien->getPrenom() . "<br> Ville : " . $praticien->getVille() . "<br> Email : " . $praticien->getEmail() . "<br> Télephone : " . $praticien->getTelephone();
    }
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage() . "\n";
}
