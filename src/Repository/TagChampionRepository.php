<?php

namespace App\Repository;

use App\Entity\TagChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TagChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagChampion[]    findAll()
 * @method TagChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagChampion::class);
    }

    // /**
    //  * @return TagChampion[] Returns an array of TagChampion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TagChampion
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
