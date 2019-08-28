<?php

namespace App\Repository;

use App\Entity\StockStructure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StockStructure|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockStructure|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockStructure[]    findAll()
 * @method StockStructure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockStructureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StockStructure::class);
    }

    // /**
    //  * @return StockStructure[] Returns an array of StockStructure objects
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
    public function findOneBySomeField($value): ?StockStructure
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
