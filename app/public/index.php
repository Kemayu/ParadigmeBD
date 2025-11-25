<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Paradigme\Domain\Entities\Spectacle;

try {
    $mapping_path = __DIR__ . '/../infrastructure/mapping/';
    $isDevMode = true;
    $dbParams = parse_ini_file(__DIR__ . '/../config/prati.ini');
    
    $config = ORMSetup::createXMLMetadataConfiguration([$mapping_path], $isDevMode);
    $connection = DriverManager::getConnection($dbParams, $config);
    $entityManager = new EntityManager($connection, $config);

    $spectacleRepository = $entityManager->getRepository(Spectacle::class);
    $s = $spectacleRepository->find(1);
    
    if ($s === null) {
        echo "Spectacle non trouvé\n";
        exit;
    }
    
    echo "Titre: " . $s->titre . "\n";
    echo "Description: " . $s->description . "\n";
    echo "Lieu: " . $s->lieu->nom . "\n";
    echo "Séances:\n";
    
    foreach ($s->seances as $seance) {
        echo "  - " . $seance->date . " à " . $seance->heure . "\n";
    }
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage() . "\n";
}