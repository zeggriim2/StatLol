<?php

namespace App\Repository;

use App\Entity\ImageSpell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageSpell|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageSpell|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageSpell[]    findAll()
 * @method ImageSpell[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageSpellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageSpell::class);
    }

    // /**
    //  * @return ImageSpell[] Returns an array of ImageSpell objects
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
    public function findOneBySomeField($value): ?ImageSpell
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
