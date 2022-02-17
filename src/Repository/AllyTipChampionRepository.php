<?php

namespace App\Repository;

use App\Entity\AllyTipChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AllyTipChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method AllyTipChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method AllyTipChampion[]    findAll()
 * @method AllyTipChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllyTipChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AllyTipChampion::class);
    }

    // /**
    //  * @return AllyTipChampion[] Returns an array of AllyTipChampion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AllyTipChampion
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
