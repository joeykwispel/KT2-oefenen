<?php

namespace App\Repository;

use App\Entity\SubProducten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubProducten|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubProducten|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubProducten[]    findAll()
 * @method SubProducten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubProductenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubProducten::class);
    }

    // /**
    //  * @return SubProducten[] Returns an array of SubProducten objects
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
    public function findOneBySomeField($value): ?SubProducten
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
