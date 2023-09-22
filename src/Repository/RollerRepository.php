<?php

namespace App\Repository;

use App\Entity\Roller;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Roller>
 *
 * @method Roller|null find($id, $lockMode = null, $lockVersion = null)
 * @method Roller|null findOneBy(array $criteria, array $orderBy = null)
 * @method Roller[]    findAll()
 * @method Roller[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RollerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Roller::class);
    }

//    /**
//     * @return Roller[] Returns an array of Roller objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Roller
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
