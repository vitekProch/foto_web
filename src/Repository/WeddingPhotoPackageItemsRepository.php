<?php

namespace App\Repository;

use App\Entity\WeddingPhotoPackageItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeddingPhotoPackageItems>
 *
 * @method WeddingPhotoPackageItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeddingPhotoPackageItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeddingPhotoPackageItems[]    findAll()
 * @method WeddingPhotoPackageItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeddingPhotoPackageItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeddingPhotoPackageItems::class);
    }

//    /**
//     * @return WeddingPhotoPackageItems[] Returns an array of WeddingPhotoPackageItems objects
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

//    public function findOneBySomeField($value): ?WeddingPhotoPackageItems
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
