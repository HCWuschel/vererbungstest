<?php

namespace App\Repository;

use App\Entity\Fahrrad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fahrrad>
 *
 * @method Fahrrad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fahrrad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fahrrad[]    findAll()
 * @method Fahrrad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FahrradRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fahrrad::class);
    }

//    /**
//     * @return Fahrrad[] Returns an array of Fahrrad objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Fahrrad
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
