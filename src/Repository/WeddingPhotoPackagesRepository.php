<?php

namespace App\Repository;

use App\Entity\WeddingPhotoPackages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeddingPhotoPackages>
 *
 * @method WeddingPhotoPackages|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeddingPhotoPackages|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeddingPhotoPackages[]    findAll()
 * @method WeddingPhotoPackages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeddingPhotoPackagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeddingPhotoPackages::class);
    }

//    /**
//     * @return WeddingPhotoPackages[] Returns an array of WeddingPhotoPackages objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WeddingPhotoPackages
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
