<?php

namespace App\Repository;

use App\Entity\CoolDownSpell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoolDownSpell|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoolDownSpell|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoolDownSpell[]    findAll()
 * @method CoolDownSpell[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoolDownSpellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoolDownSpell::class);
    }

    // /**
    //  * @return CoolDownSpell[] Returns an array of CoolDownSpell objects
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
    public function findOneBySomeField($value): ?CoolDownSpell
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
