<?php

namespace App\Repository;

use App\Entity\SCFahrzeug;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SCFahrzeug>
 *
 * @method SCFahrzeug|null find($id, $lockMode = null, $lockVersion = null)
 * @method SCFahrzeug|null findOneBy(array $criteria, array $orderBy = null)
 * @method SCFahrzeug[]    findAll()
 * @method SCFahrzeug[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SCFahrzeugRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SCFahrzeug::class);
    }

//    /**
//     * @return SCFahrzeug[] Returns an array of SCFahrzeug objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SCFahrzeug
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
