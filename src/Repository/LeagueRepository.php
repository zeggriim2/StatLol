<?php

namespace App\Repository;

use App\Entity\Queue;
use App\Entity\League;
use App\Entity\Summoner;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method League|null find($id, $lockMode = null, $lockVersion = null)
 * @method League|null findOneBy(array $criteria, array $orderBy = null)
 * @method League[]    findAll()
 * @method League[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeagueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, League::class);
    }

    public function findLastTimeInterval(
        Queue $queue,
        Summoner $summoner,
        string $modifier = "-5 minutes"
    ): ?League
    {
        $dateModifier = (new \DateTimeImmutable())->modify($modifier);

        return $this->createQueryBuilder("l")
            ->andWhere("l.summoner = :summoner")
            ->andWhere("l.queue =  :queue")
            ->andWhere("l.createdAt >= :date")
            ->setParameter("queue", $queue)
            ->setParameter("date", $dateModifier)
            ->setParameter("summoner", $summoner)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // /**
    //  * @return League[] Returns an array of League objects
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
    public function findOneBySomeField($value): ?League
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
