<?php

namespace App\Repository;

use App\Entity\Tier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tier[]    findAll()
 * @method Tier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tier::class);
    }

    // /**
    //  * @return Tier[] Returns an array of Tier objects
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
    public function findOneBySomeField($value): ?Tier
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
