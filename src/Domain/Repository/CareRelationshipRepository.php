<?php

namespace App\Domain\Repository;

use App\Domain\Entity\CareRelationship;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CareRelationship>
 *
 * @method CareRelationship|null find($id, $lockMode = null, $lockVersion = null)
 * @method CareRelationship|null findOneBy(array $criteria, array $orderBy = null)
 * @method CareRelationship[]    findAll()
 * @method CareRelationship[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CareRelationshipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CareRelationship::class);
    }

    //    /**
    //     * @return CareRelationship[] Returns an array of CareRelationship objects
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

    //    public function findOneBySomeField($value): ?CareRelationship
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
