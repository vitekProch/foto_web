<?php

namespace App\Controller\Admin;

use App\Entity\WeddingPhotoPackageType;
use App\Form\WeddingPhotoPackagesType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WeddingPhotoPackageTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WeddingPhotoPackageType::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('weddingPhotoPackageName', 'Název celku');
        yield CollectionField::new('weddingPhotoPackages', 'Položky balíčku')
            ->setFormTypeOption('entry_type',WeddingPhotoPackagesType::class);
    }

}
