<?php

namespace App\Repository;

use App\Entity\MerlinSpeech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;

/**
 * @method MerlinSpeech|null find($id, $lockMode = null, $lockVersion = null)
 * @method MerlinSpeech|null findOneBy(array $criteria, array $orderBy = null)
 * @method MerlinSpeech[]    findAll()
 * @method MerlinSpeech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MerlinSpeechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MerlinSpeech::class);
    }

    /**
     * @return MerlinSpeech[]
     */
    public function findAllVisible(): array
    {
        return $this->findAllVisibleQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * @return MerlinSpeech[]
     */
    public function findLastOnes(): array
    {
        return $this->findAllVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return QueryBuilder
     */
    private function findAllVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('speech')
            ->where('speech.truthful = true');
    }

    // /**
    //  * @return MerlinSpeech[] Returns an array of MerlinSpeech objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MerlinSpeech
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
