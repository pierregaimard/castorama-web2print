<?php

namespace App\Repository;

use App\Entity\AisleSignItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AisleSignItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method AisleSignItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method AisleSignItem[]    findAll()
 * @method AisleSignItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AilseSignItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AisleSignItem::class);
    }

    // /**
    //  * @return AilseSignItem[] Returns an array of AilseSignItem objects
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
    public function findOneBySomeField($value): ?AilseSignItem
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
