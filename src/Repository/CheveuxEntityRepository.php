<?php

namespace App\Repository;

use App\Entity\CheveuxEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CheveuxEntity>
 *
 * @method CheveuxEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheveuxEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheveuxEntity[]    findAll()
 * @method CheveuxEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheveuxEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheveuxEntity::class);
    }

//    /**
//     * @return CheveuxEntity[] Returns an array of CheveuxEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CheveuxEntity
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
