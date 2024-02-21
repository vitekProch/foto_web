<?php

namespace App\Controller\Admin;

use App\Entity\PhotoPackageNames;
use App\Form\PhotoPackageDetailsType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PhotoPackageNamesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PhotoPackageNames::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('photoPackageTitle', 'Název balíčku')
            ->setRequired(true);
        yield CollectionField::new('photoPackageDetails', 'Položky balíčku')
            ->setFormTypeOption('entry_type',PhotoPackageDetailsType::class)
            ->renderExpanded()
            ->setRequired(true);
    }

}
