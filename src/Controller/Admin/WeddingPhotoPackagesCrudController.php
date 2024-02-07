<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Price\MyCustomField;
use App\Entity\WeddingPackageItems;
use App\Entity\WeddingPhotoPackages;
use App\Repository\WeddingPackageItemsRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WeddingPhotoPackagesCrudController extends AbstractCrudController
{
    private WeddingPackageItemsRepository $weddingPackageItemsRepository;

    public function __construct(WeddingPackageItemsRepository $weddingPackageItemsRepository)
    {
        $this->weddingPackageItemsRepository = $weddingPackageItemsRepository;
    }

    public static function getEntityFqcn(): string
    {
        return WeddingPhotoPackages::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();

        yield TextField::new('packageName', 'Název balíčku');

        yield ChoiceField::new('packageItems', 'Položky v balíčku')
            ->allowMultipleChoices()
            ->autocomplete()
            ->renderAsBadges()
            ->setChoices($this->weddingPackageItemsRepository->getItemsBro());

        yield MoneyField::new('packagePrice', 'Cena balíčku')
            ->setCurrency('CZK');


        yield ArrayField::new('myCustomField', 'Název pole')
            ->setRequired(false)
            ->hideOnIndex();
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->updateEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $selectedItems = $entityInstance->getPackageItems();

        foreach($entityInstance->getMyCustomField() as $itemName) {
            $this->weddingPackageItemsRepository->setItemsFromArray($itemName);
            array_push($selectedItems, $this->weddingPackageItemsRepository->findOneBySomeField($itemName)->getId());
        }

        $entityInstance->setPackageItems($selectedItems);
        parent::updateEntity($entityManager, $entityInstance);
    }

}

