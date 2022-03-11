<?php

namespace App\Repository;

use App\Entity\TagItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TagItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagItem[]    findAll()
 * @method TagItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagItem::class);
    }

    // /**
    //  * @return TagItem[] Returns an array of TagItem objects
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
    public function findOneBySomeField($value): ?TagItem
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
