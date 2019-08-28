<?php

namespace App\Repository;

use App\Entity\DetailsTransfert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetailsTransfert|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailsTransfert|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailsTransfert[]    findAll()
 * @method DetailsTransfert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailsTransfertRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetailsTransfert::class);
    }

    // /**
    //  * @return DetailsTransfert[] Returns an array of DetailsTransfert objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetailsTransfert
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
