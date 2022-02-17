<?php

namespace App\Repository;

use App\Entity\EnemyTipChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnemyTipChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnemyTipChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnemyTipChampion[]    findAll()
 * @method EnemyTipChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnemyTipChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnemyTipChampion::class);
    }

    // /**
    //  * @return EnemyTipChampion[] Returns an array of EnemyTipChampion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnemyTipChampion
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
