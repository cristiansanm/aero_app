<?php

namespace App\Repository;

use App\Entity\Aviones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aviones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aviones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aviones[]    findAll()
 * @method Aviones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvionesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aviones::class);
    }
    public function consultaPorPersonalId($idForm){
        $dql = "SELECT persona.id, persona.apellido, persona.basepersonal FROM
        App:Aviones as persona 
        WHERE :id = persona.id";
        return $this->getEntityManager()
        ->createQuery($dql)->setParameter('id', $idForm)->getOneOrNullResult();
    }
    
    /**
     * @return Aviones[] Returns an array of Aviones objects
     */
    
    public function findByAvionOne($id)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @return Aviones[] Returns an array of Aviones objects
     */
    
    public function findByAvion($id)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.baseavion = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }
    
    /**
     * @return Aviones[] Returns an array of Aviones objects
     */
    
    public function findByDisponible($dispo)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.disponible = :dispo')
            ->setParameter('dispo', $dispo)
            ->getQuery()
            ->getResult()
        ;
    }
    
    /*
    public function findOneBySomeField($value): ?Aviones
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
