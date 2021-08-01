<?php

namespace App\Repository;

use App\Entity\CustomerShopAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerShopAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerShopAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerShopAddress[]    findAll()
 * @method CustomerShopAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerShopAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerShopAddress::class);
    }

    // /**
    //  * @return CustomerShopAddress[] Returns an array of CustomerShopAddress objects
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
    public function findOneBySomeField($value): ?CustomerShopAddress
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
