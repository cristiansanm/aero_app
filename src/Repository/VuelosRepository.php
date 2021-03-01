<?php

namespace App\Repository;

use App\Entity\Vuelos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vuelos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vuelos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vuelos[]    findAll()
 * @method Vuelos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VuelosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vuelos::class);
    }

    
    /**
     * @return Vuelos[] Returns an array of Vuelos objects
     */
    
    public function findByOrigen($origen)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.origen= :origen')
            ->setParameter('origen', $origen)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Vuelos[] Returns an array of Vuelos objects
     */
    
    public function findByDestino($destino)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.destino= :destino')
            ->setParameter('destino', $destino)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Vuelos[] Returns an array of Vuelos objects
     */
    
    public function findByFecha($fecha)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.fecha= :fecha')
            ->setParameter('fecha', $fecha)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Vuelos[] Returns an array of Vuelos objects
     */
    
    public function findByAvion($idAvion)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.avion= :idavion')
            ->setParameter('idavion', $idAvion)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Vuelos
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
