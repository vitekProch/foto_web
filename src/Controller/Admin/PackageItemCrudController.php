<?php

namespace App\Controller\Admin;

use App\Entity\PackageItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PackageItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PackageItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Název položky'),
        ];
    }
}
