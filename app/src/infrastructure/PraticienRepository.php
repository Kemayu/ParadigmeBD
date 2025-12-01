<?php

namespace doctrine\infra;

use Doctrine\ORM\EntityRepository;

class PraticienRepository extends EntityRepository
{
    public function findByMotCle(string $motCle): array
    {
        $dql = "SELECT p FROM doctrine\\core\\entities\\Praticien p
        JOIN p.specialite s
 WHERE s.libelle LIKE :motCle  OR s.description LIKE :motCle";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('motCle', '%' . $motCle . '%');
        return $query->getResult();
    }

    public function findBySpecialiteEtMoyenPaiement(string $specialite, string $moyenPaiement): array
    {
        $dql = "SELECT p FROM doctrine\\core\\entities\\Praticien p
        JOIN p.specialite s
        JOIN p.moyenPaiements m
        WHERE s.libelle LIKE :specialite  AND m.libelle LIKE :moyenPaiements";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('moyenPaiements', $moyenPaiement);
        $query->setParameter('specialite', $specialite);
        return $query->getResult();
    }
}
