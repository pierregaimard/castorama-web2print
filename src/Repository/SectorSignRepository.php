<?php

namespace App\Repository;

use App\Entity\SectorSign;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SectorSign|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectorSign|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectorSign[]    findAll()
 * @method SectorSign[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectorSignRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectorSign::class);
    }

    // /**
    //  * @return SectorSign[] Returns an array of SectorSign objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SectorSign
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
