<?php

namespace App\Repository;

use App\Entity\ResidentsAndPlanets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResidentsAndPlanets|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResidentsAndPlanets|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResidentsAndPlanets[]    findAll()
 * @method ResidentsAndPlanets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResidentsAndPlanetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResidentsAndPlanets::class);
    }

    // /**
    //  * @return ResidentsAndPlanets[] Returns an array of ResidentsAndPlanets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResidentsAndPlanets
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
