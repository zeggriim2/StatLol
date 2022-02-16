<?php

namespace App\Repository;

use App\Entity\SkinChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SkinChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkinChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkinChampion[]    findAll()
 * @method SkinChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkinChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkinChampion::class);
    }

    // /**
    //  * @return SkinChampion[] Returns an array of SkinChampion objects
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
    public function findOneBySomeField($value): ?SkinChampion
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
