<?php

namespace App\Repository;

use App\Entity\ImageChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageChampion[]    findAll()
 * @method ImageChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageChampionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageChampion::class);
    }

    // /**
    //  * @return ImageChampion[] Returns an array of ImageChampion objects
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
    public function findOneBySomeField($value): ?ImageChampion
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
