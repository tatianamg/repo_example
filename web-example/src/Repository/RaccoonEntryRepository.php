<?php

namespace App\Repository;

use App\Entity\RaccoonEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RaccoonEntry|null find($id, $lockMode = null, $lockVersion = null)
 * @method RaccoonEntry|null findOneBy(array $criteria, array $orderBy = null)
 * @method RaccoonEntry[]    findAll()
 * @method RaccoonEntry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaccoonEntryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RaccoonEntry::class);
    }

    // /**
    //  * @return RaccoonEntry[] Returns an array of RaccoonEntry objects
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
    public function findOneBySomeField($value): ?RaccoonEntry
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
