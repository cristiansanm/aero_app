<?php

namespace App\Repository;

use App\Entity\VuelosPersonal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VuelosPersonal|null find($id, $lockMode = null, $lockVersion = null)
 * @method VuelosPersonal|null findOneBy(array $criteria, array $orderBy = null)
 * @method VuelosPersonal[]    findAll()
 * @method VuelosPersonal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VuelosPersonalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VuelosPersonal::class);
    }

    

    //  /**
    //   * @return VuelosPersonal[] Returns an array of VuelosPersonal objects
    //   */
    // public function findByPiloto($idVuelos)
    // {

    //     return $this->createQueryBuilder('va')
    //         ->andWhere('v.vueloId = :idVuelos')
    //         ->setParameter('val', $idVuelos)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    

    /*
    public function findOneBySomeField($value): ?VuelosPersonal
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
