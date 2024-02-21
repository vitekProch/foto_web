<?php

namespace App\Controller\Admin;

use App\Entity\WeddingPackage;
use App\Form\SubPackageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WeddingPackageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WeddingPackage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Název balíčku'),
            CollectionField::new('subPackages', 'Podbalíčky')
                ->setEntryType(SubPackageType::class)
                ->renderExpanded()
                ->setRequired(true)
        ];
    }
}
