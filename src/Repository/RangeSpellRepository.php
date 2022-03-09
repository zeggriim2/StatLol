<?php

namespace App\Repository;

use App\Entity\RangeSpell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RangeSpell|null find($id, $lockMode = null, $lockVersion = null)
 * @method RangeSpell|null findOneBy(array $criteria, array $orderBy = null)
 * @method RangeSpell[]    findAll()
 * @method RangeSpell[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RangeSpellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RangeSpell::class);
    }

    // /**
    //  * @return RangeSpell[] Returns an array of RangeSpell objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RangeSpell
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
