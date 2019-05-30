<?php

namespace App\Repository;

use App\Entity\RaccoonUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RaccoonUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method RaccoonUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method RaccoonUser[]    findAll()
 * @method RaccoonUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaccoonUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RaccoonUser::class);
    }

    // /**
    //  * @return RaccoonUser[] Returns an array of RaccoonUser objects
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

    
    public function findOneById($value): ?RaccoonUser
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
