<?php

namespace App\Repository;

use App\Entity\MerlinSpeech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MerlinSpeech|null find($id, $lockMode = null, $lockVersion = null)
 * @method MerlineSpeech|null findOneBy(array $criteria, array $orderBy = null)
 * @method MerlinSpeech[]    findAll()
 * @method MerlinSpeech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MerlinSpeechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MerlinSpeech::class);
    }

    // /**
    //  * @return MerlinSpeech[] Returns an array of MerlinSpeech objects
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
    public function findOneBySomeField($value): ?MerlinSpeech
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
