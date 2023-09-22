<?php

namespace App\Repository;

use App\Entity\Einrad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Einrad>
 *
 * @method Einrad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Einrad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Einrad[]    findAll()
 * @method Einrad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EinradRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Einrad::class);
    }

//    /**
//     * @return Einrad[] Returns an array of Einrad objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Einrad
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
