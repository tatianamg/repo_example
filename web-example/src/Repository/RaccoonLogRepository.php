<?php

namespace App\Repository;

use App\Entity\RaccoonLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RaccoonLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method RaccoonLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method RaccoonLog[]    findAll()
 * @method RaccoonLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaccoonLogRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RaccoonLog::class);
    }

    // /**
    //  * @return RaccoonLog[] Returns an array of RaccoonLog objects
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
    public function findOneBySomeField($value): ?RaccoonLog
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
