<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use doctrine\core\entities\MotifVisite;
use doctrine\core\entities\Praticien;
use doctrine\core\entities\Specialite;
use doctrine\core\entities\Structure;
use Doctrine\DBAL\DriverManager;
use doctrine\infra\SpecialiteRepository;
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
    $motifVisiteRepository = $entityManager->getRepository(MotifVisite::class);

    $structures = $structureRepository->find("3444bdd2-8783-3aed-9a5e-4d298d2a2d7c");
    $specialites = $specialiteRepository->find(1);
    $praticien = $praticienRepository->find("8ae1400f-d46d-3b50-b356-269f776be532");
    $motifVisite = $motifVisiteRepository->findAll();
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
    $pediatrie = $specialiteRepository->findOneBy(['libelle' => 'pédiatrie']);
    $praticien1 = new Praticien($pediatrie, $structureRepository->find("372c1de7-4d31-3d01-9c92-77e69467d4e3"), "ke", "efds", "fezf", "fedf", "fe", "fe", "dlk", 1, 0);
    $praticien1->setId(Uuid::uuid4()->toString()); //génère un uuid (sans sa erreur)
    $entityManager->persist($praticien1); //Si pas persist modif/insetion/delete impossible 
    $entityManager->flush(); // insert dans la bd (prend en compte des entité persist)

    //8
    $praticien1->setStructure($structureRepository->findOneBy(['nom' => 'Cabinet Bigot']));
    $praticien1->setVille('Paris');

    $motif = new ArrayCollection($motifVisite);
    $praticien1->setMotifVisite($motif);
    $entityManager->flush(); //Fait la modif dans la BD 

    //9
    $entityManager->remove($praticien1);
    $entityManager->flush(); //Mise a jour de la BD -> Suppression du praticien1 

    //Exercice 2 : 
    //1
    $praticienGabrielle = $praticienRepository->findOneBy(['email' => 'Gabrielle.Klein@live.com']);
    echo "<br> Exercice 2 : <br> 1) <br> Nom : " . $praticienGabrielle->getNom() . ' | Email : ' . $praticienGabrielle->getEmail();

    //2
    $praticienGoncalve = $praticienRepository->findOneBy(['nom' => 'Goncalves', 'ville' => 'Paris']);
    echo "<br> 2) <br> Nom : " . $praticienGoncalve->getNom() . "  | Ville : " . $praticienGoncalve->getVille();

    //3
    echo "<br> 3) <br> Libelle de Spé : " . $pediatrie->getLibelle();
    foreach ($pediatrie->getPraticien() as $p) {
        echo "<br> Nom : " . $p->getNom();
    }

    //4
    $description = $specialiteRepository->matching(
        Criteria::create()
            ->where(Criteria::expr()->contains("description", "santé"))
    );
    echo "<br> 4) ";
    if ($description->isEmpty()) {
        echo "Aucune valeur trouvé";
    } else {

        foreach ($description as $d) {
            echo "<br> Libelle :" . $d->getLibelle() . " | Description : " . $d->getDescription();
        }
    }

    //5
    $praticienOph = $specialiteRepository->matching(
        Criteria::create()
            ->where(Criteria::expr()->contains("libelle", "ophtalmologie"))
    );
    echo " <br> Ophtalmologie  à Paris :";
    foreach ($praticienOph as $p) {
        $pa = $p->getPraticien();
        foreach ($pa as $m) {
            if ($m->getVille() == "Paris") {
                echo "<br>" . $m->getNom();
            }
        }
    }

    //Exercice 3 :
    //1
    $motCle = 'Mal';
    echo "<br>Exercice 3 : <br> 1) Mot Clé : $motCle <br>";
    foreach ($specialiteRepository->findByMotCle($motCle) as $s) {
        echo "Libelle  : " . $s->getLibelle() . " | Description : " . $s->getDescription() . "<br>";
    }

    //2
    echo "<br> 2) Mot Clé : $motCle <br>";
    foreach ($praticienRepository->findByMotCle($motCle) as $p) {
        echo "Nom  : " . $p->getNom(). "<br>";
    }

    //3
    $spe = "pédiatrie";
    $moy = "espèces";
    echo "<br> 3) Moyen de Paiement : $moy | Spécialité : $spe <br>";
     foreach ($praticienRepository->findBySpecialiteEtMoyenPaiement($spe,$moy) as $p) {
        echo "Nom  : " . $p->getNom(). "<br>";
    }

} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage() . "\n";
}
