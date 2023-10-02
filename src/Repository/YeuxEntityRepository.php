<?php

namespace App\Repository;

use App\Entity\YeuxEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<YeuxEntity>
 *
 * @method YeuxEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method YeuxEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method YeuxEntity[]    findAll()
 * @method YeuxEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YeuxEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, YeuxEntity::class);
    }

//    /**
//     * @return YeuxEntity[] Returns an array of YeuxEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('y')
//            ->andWhere('y.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('y.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?YeuxEntity
//    {
//        return $this->createQueryBuilder('y')
//            ->andWhere('y.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
