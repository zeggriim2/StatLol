<?php

namespace App\Repository;

use App\Entity\GoldItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GoldItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoldItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoldItem[]    findAll()
 * @method GoldItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoldItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoldItem::class);
    }

    // /**
    //  * @return GoldItem[] Returns an array of GoldItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoldItem
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
