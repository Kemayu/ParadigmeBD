<?php

namespace doctrine\infra;

use Doctrine\ORM\EntityRepository;

class SpecialiteRepository extends EntityRepository
{
    public function findByMotCle(string $motCle): array
    {
        $dql = "SELECT s FROM doctrine\\core\\entities\\Specialite s
 WHERE s.libelle LIKE :motCle OR s.description LIKE :motCle";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('motCle', '%' . $motCle . '%');
        return $query->getResult();
    }
}
