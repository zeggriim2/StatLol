<?php

namespace App\Repository;

use App\Entity\ParTypeChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParTypeChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParTypeChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParTypeChampion[]    findAll()
 * @method ParTypeChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParTypeChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParTypeChampion::class);
    }

    // /**
    //  * @return ParTypeChampion[] Returns an array of ParTypeChampion objects
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
    public function findOneBySomeField($value): ?ParTypeChampion
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
