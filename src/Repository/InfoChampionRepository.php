<?php

namespace App\Repository;

use App\Entity\InfoChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfoChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoChampion[]    findAll()
 * @method InfoChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfoChampion::class);
    }

    // /**
    //  * @return InfoChampion[] Returns an array of InfoChampion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfoChampion
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
