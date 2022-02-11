<?php

namespace App\Repository;

use App\Entity\PartType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartType[]    findAll()
 * @method PartType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartType::class);
    }

    // /**
    //  * @return PartType[] Returns an array of PartType objects
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
    public function findOneBySomeField($value): ?PartType
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
