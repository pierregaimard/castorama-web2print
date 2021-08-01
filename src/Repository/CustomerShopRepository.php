<?php

namespace App\Repository;

use App\Entity\CustomerShop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerShop|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerShop|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerShop[]    findAll()
 * @method CustomerShop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerShopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerShop::class);
    }

    // /**
    //  * @return CustomerShop[] Returns an array of CustomerShop objects
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
    public function findOneBySomeField($value): ?CustomerShop
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
