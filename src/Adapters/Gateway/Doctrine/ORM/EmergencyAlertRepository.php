<?php

namespace App\Adapters\Gateway\Doctrine\ORM;

use App\Adapters\Gateway\Doctrine\ORM\Entity\EmergencyAlert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmergencyAlert>
 *
 * @method EmergencyAlert|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmergencyAlert|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmergencyAlert[]    findAll()
 * @method EmergencyAlert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmergencyAlertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmergencyAlert::class);
    }

    //    /**
    //     * @return EmergencyAlert[] Returns an array of EmergencyAlert objects
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

    //    public function findOneBySomeField($value): ?EmergencyAlert
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
