<?php

namespace App\Repository;

use App\Entity\PlanetsAndResidents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PlanetsAndResidents|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanetsAndResidents|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanetsAndResidents[]    findAll()
 * @method PlanetsAndResidents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanetsAndResidentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanetsAndResidents::class);
    }

    // /**
    //  * @return PlanetsAndResidents[] Returns an array of PlanetsAndResidents objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanetsAndResidents
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
