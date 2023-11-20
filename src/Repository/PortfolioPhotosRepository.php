<?php

namespace App\Repository;

use App\Entity\PortfolioPhotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PortfolioPhotos>
 *
 * @method PortfolioPhotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioPhotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioPhotos[]    findAll()
 * @method PortfolioPhotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioPhotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioPhotos::class);
    }

//    /**
//     * @return PortfolioPhotos[] Returns an array of PortfolioPhotos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PortfolioPhotos
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
