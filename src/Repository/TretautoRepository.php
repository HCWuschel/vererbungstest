<?php

namespace App\Repository;

use App\Entity\Tretauto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tretauto>
 *
 * @method Tretauto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tretauto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tretauto[]    findAll()
 * @method Tretauto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TretautoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tretauto::class);
    }

//    /**
//     * @return Tretauto[] Returns an array of Tretauto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tretauto
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
