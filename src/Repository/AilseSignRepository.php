<?php

namespace App\Repository;

use App\Entity\AisleSign;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AisleSign|null find($id, $lockMode = null, $lockVersion = null)
 * @method AisleSign|null findOneBy(array $criteria, array $orderBy = null)
 * @method AisleSign[]    findAll()
 * @method AisleSign[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AilseSignRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AisleSign::class);
    }

    // /**
    //  * @return AilseSign[] Returns an array of AilseSign objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AilseSign
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
