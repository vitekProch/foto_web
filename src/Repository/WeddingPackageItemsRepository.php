<?php

namespace App\Repository;

use App\Entity\WeddingPackageItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeddingPackageItems>
 *
 * @method WeddingPackageItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeddingPackageItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeddingPackageItems[]    findAll()
 * @method WeddingPackageItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeddingPackageItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeddingPackageItems::class);
    }

    public function getItemsBro(): array
    {
        $qb = $this->createQueryBuilder('w'); // Definujeme alias 'w' pro entitu WeddingPackageItems
        $qb->select('w.itemName', 'w.id'); // Používáme alias 'w' pro sloupec itemName
        $results = $qb->getQuery()->getResult();
    
        $choices = [];
        foreach ($results as $result) {
            // Přistupujeme k názvu sloupce přímo bez aliasu
            $choices[$result['itemName']] = $result['id'];
        }
    
        return $choices;
    }

    public function setItemsFromArray(string $itemName): void
    {
        $weddingPackageItem = new WeddingPackageItems();
        $weddingPackageItem->setItemName($itemName);
        $this->_em->persist($weddingPackageItem);
        $this->_em->flush();
    }

    public function findOneBySomeField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.itemName = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
