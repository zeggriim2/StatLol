<?php

namespace App\Repository;

use App\Entity\StatChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatChampion[]    findAll()
 * @method StatChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatChampion::class);
    }

    // /**
    //  * @return StatChampion[] Returns an array of StatChampion objects
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
    public function findOneBySomeField($value): ?StatChampion
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
