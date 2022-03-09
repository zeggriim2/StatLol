<?php

namespace App\Repository;

use App\Entity\LevelTipSpell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LevelTipSpell|null find($id, $lockMode = null, $lockVersion = null)
 * @method LevelTipSpell|null findOneBy(array $criteria, array $orderBy = null)
 * @method LevelTipSpell[]    findAll()
 * @method LevelTipSpell[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LevelTipSpellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LevelTipSpell::class);
    }

    // /**
    //  * @return LevelTipSpell[] Returns an array of LevelTipSpell objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LevelTipSpell
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
