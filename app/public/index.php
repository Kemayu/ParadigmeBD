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
use Ramsey\Uuid\Uuid;

try {
    $mapping_path = __DIR__ . '/../src/infrastructure/mapping/';
    $isDevMode = true;
    $dbParams = parse_ini_file(__DIR__ . '/../config/prati.ini');

    $config = ORMSetup::createXMLMetadataConfiguration([$mapping_path], $isDevMode);
    $connection = DriverManager::getConnection($dbParams, $config);
    $entityManager = new EntityManager($connection, $config);

    $structureRepository = $entityManager->getRepository(Structure::class);
    $specialiteRepository = $entityManager->getRepository(Specialite::class);
    $praticienRepository = $entityManager->getRepository(Praticien::class);

    $structures = $structureRepository->find("3444bdd2-8783-3aed-9a5e-4d298d2a2d7c");
    $specialites = $specialiteRepository->find(1);
    $praticien = $praticienRepository->find("8ae1400f-d46d-3b50-b356-269f776be532");

    // var_dump($praticien);
    if (!empty($specialites)) {

        echo "1) <br> Id : " . $specialites->getId() . "<br> Libelle: " . $specialites->getLibelle()  . "<br> Description : "
            . $specialites->getDescription();
    }

    if (!empty($praticien)) {

        echo "<br> 2) <br> Id : " . $praticien->getId() . "<br> Nom: " . $praticien->getNom()  . "<br> Prénom : " . $praticien->getPrenom()
            . "<br> Ville : " . $praticien->getVille() . "<br> Email : " . $praticien->getEmail() . "<br> Téléphone : "
            . $praticien->getTelephone() . "<br> 3) Spécialité : " . $praticien->getSpecialite()->getLibelle() . " <br> Structure : " . $praticien->getStructure()->getNom();
    }

    if (!empty($structures)) {
        echo "<br> 4) Structure : " . $structures->getId() . " :";
        foreach ($structures->getPraticien() as $p) {
            echo "<br> Nom : " . $p->getNom();
        }
    }
    if (!empty($specialites)) {
        echo "<br> 5) Spécialité ID : " . $specialites->getId() . " :";
        foreach ($specialites->getMotifVisite() as $m) {
            echo "<br> Motif de la Visite : " . $m->getLibelle();
        }
    }
    if (!empty($praticien)) {

        echo "<br> 6) Motif de la Visite du Praticien : "  . $praticien->getId();
        foreach ($praticien->getMotifVisite() as $p) {
            echo "<br>"  . $p->getLibelle();
        }
    }
    
    //7
    $pediatrie =$specialiteRepository->findOneBy(['libelle' => 'pédiatrie']);
    $praticien1 = new Praticien($pediatrie, $structureRepository->find("3444bdd2-8783-3aed-9a5e-4d298d2a2d7c"),"ke","efds","fezf","fedf","fe","fe","dlk",1,0);
    $praticien1->setId(Uuid::uuid4()->toString()); //génère un uuid (sans sa erreur)
    $entityManager->persist($praticien1); // insert dans la bd
    $entityManager->flush(); 

//8

} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage() . "\n";
}
