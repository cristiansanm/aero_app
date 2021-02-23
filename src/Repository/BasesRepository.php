<?php

namespace App\Repository;

use App\Entity\Bases;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bases|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bases|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bases[]    findAll()
 * @method Bases[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bases::class);
    }

    // /**
    //  * @return Bases[] Returns an array of Bases objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bases
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
