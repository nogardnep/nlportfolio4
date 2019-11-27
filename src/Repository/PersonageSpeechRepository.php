<?php

namespace App\Repository;

use App\Entity\PersonageSpeech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PersonageSpeech|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonageSpeech|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonageSpeech[]    findAll()
 * @method PersonageSpeech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonageSpeechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonageSpeech::class);
    }

    // /**
    //  * @return PersonageSpeech[] Returns an array of PersonageSpeech objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonageSpeech
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
