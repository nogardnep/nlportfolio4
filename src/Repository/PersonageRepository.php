<?php

namespace App\Repository;

use App\Entity\Personage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Personage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personage[]    findAll()
 * @method Personage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personage::class);
    }

    // /**
    //  * @return Personage[] Returns an array of Personage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Personage
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
