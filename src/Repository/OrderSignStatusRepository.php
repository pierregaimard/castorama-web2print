<?php

namespace App\Repository;

use App\Entity\OrderSignStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderSignStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderSignStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderSignStatus[]    findAll()
 * @method OrderSignStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderSignStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderSignStatus::class);
    }

    // /**
    //  * @return OrderSignStatus[] Returns an array of OrderSignStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderSignStatus
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
