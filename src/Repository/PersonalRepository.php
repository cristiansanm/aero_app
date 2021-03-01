<?php

namespace App\Repository;

use App\Entity\Personal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Personal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personal[]    findAll()
 * @method Personal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personal::class);
    }

     /**
     * @return Personal[] Returns an array of Personal objects
    */

    public function findByPersonalOne($id)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

     /**
     * @return Personal[] Returns an array of Personal objects
    */

    public function findByBase($id)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.basepersonal = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByAvion($id)
    {
        return $this->createQueryBuilder('p')
            ->where('p.funcion = piloto')
            ->andWhere('p.baseavion = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

     /**
     * @return Personal[] Returns an array of Personal objects
    */

    public function findByFuncion($idfuncion)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.funcion = :id')
            ->setParameter('id', $idfuncion)
            ->getQuery()
            ->getResult();
    }
    /*
    public function findOneBySomeField($value): ?Personal
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
