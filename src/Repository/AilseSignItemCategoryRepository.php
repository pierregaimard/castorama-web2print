<?php

namespace App\Repository;

use App\Entity\AisleSignItemCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AisleSignItemCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method AisleSignItemCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method AisleSignItemCategory[]    findAll()
 * @method AisleSignItemCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AilseSignItemCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AisleSignItemCategory::class);
    }

    // /**
    //  * @return AilseSignItemCategory[] Returns an array of AilseSignItemCategory objects
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
    public function findOneBySomeField($value): ?AilseSignItemCategory
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
