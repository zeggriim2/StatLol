<?php

namespace App\Repository;

use App\Entity\CostSpell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CostSpell|null find($id, $lockMode = null, $lockVersion = null)
 * @method CostSpell|null findOneBy(array $criteria, array $orderBy = null)
 * @method CostSpell[]    findAll()
 * @method CostSpell[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CostSpellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CostSpell::class);
    }

    // /**
    //  * @return CostSpell[] Returns an array of CostSpell objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CostSpell
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
