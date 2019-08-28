<?php

namespace App\Repository;

use App\Entity\TypeStructure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeStructure|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeStructure|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeStructure[]    findAll()
 * @method TypeStructure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeStructureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeStructure::class);
    }



    public function recupererTypeStructure()
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.hrch', 'h')
            ->addSelect('h')
            ->orderBy('t.libType', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function recupererAutresTypes(int $id)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id != :id')
            ->setParameter('id', $id)
            ->orderBy('t.libType', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function recupererTypesEtParent(int $id)
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.hrch', 'h')
            ->addSelect('h')
            ->andWhere('t.id != :id')
            ->setParameter('id', $id)
            ->orderBy('t.libType', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?TypeStructure
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
