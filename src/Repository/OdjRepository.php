<?php

namespace App\Repository;

use App\Entity\Odj;
use App\Entity\Reunion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class OdjRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Odj::class);
    }

    public function getQueryByReunion(Reunion $reunion){
        $em = $this->getEntityManager();
        $dql = "SELECT o FROM App\Entity\Odj o WHERE o.reunion = :reunion";
        $query=$em->createQuery($dql)->setParameter('reunion', $reunion);
        return $query;

    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('o')
            ->where('o.something = :value')->setParameter('value', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
