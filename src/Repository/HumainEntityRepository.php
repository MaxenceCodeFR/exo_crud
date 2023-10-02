<?php

namespace App\Repository;

use App\Entity\HumainEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HumainEntity>
 *
 * @method HumainEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method HumainEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method HumainEntity[]    findAll()
 * @method HumainEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HumainEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HumainEntity::class);
    }

//    /**
//     * @return HumainEntity[] Returns an array of HumainEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HumainEntity
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
