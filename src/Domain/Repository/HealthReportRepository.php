<?php

namespace App\Domain\Repository;

use App\Domain\Entity\HealthReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HealthReport>
 *
 * @method HealthReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method HealthReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method HealthReport[]    findAll()
 * @method HealthReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HealthReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HealthReport::class);
    }

    //    /**
    //     * @return HealthReport[] Returns an array of HealthReport objects
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

    //    public function findOneBySomeField($value): ?HealthReport
    //    {
    //        return $this->createQueryBuilder('h')
    //            ->andWhere('h.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
