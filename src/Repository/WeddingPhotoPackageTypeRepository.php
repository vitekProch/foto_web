<?php

namespace App\Repository;

use App\Entity\WeddingPhotoPackageType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeddingPhotoPackageType>
 *
 * @method WeddingPhotoPackageType|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeddingPhotoPackageType|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeddingPhotoPackageType[]    findAll()
 * @method WeddingPhotoPackageType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeddingPhotoPackageTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeddingPhotoPackageType::class);
    }

//    /**
//     * @return WeddingPhotoPackageType[] Returns an array of WeddingPhotoPackageType objects
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

//    public function findOneBySomeField($value): ?WeddingPhotoPackageType
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
