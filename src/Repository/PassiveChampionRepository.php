<?php

namespace App\Repository;

use App\Entity\PassiveChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PassiveChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method PassiveChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method PassiveChampion[]    findAll()
 * @method PassiveChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassiveChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PassiveChampion::class);
    }

    // /**
    //  * @return PassiveChampion[] Returns an array of PassiveChampion objects
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
    public function findOneBySomeField($value): ?PassiveChampion
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
