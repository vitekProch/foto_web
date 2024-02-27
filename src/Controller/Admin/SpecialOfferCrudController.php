<?php

namespace App\Controller\Admin;

use App\Entity\SpecialOffer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SpecialOfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SpecialOffer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('specialOfferName', 'Název nabídky');
        yield ImageField::new('specialOfferImage')
            ->setBasePath('uploads/specialOffer')
            ->setUploadDir('public/uploads/specialOffer')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
            ->setRequired($pageName !== Crud::PAGE_EDIT)
            ->setFormTypeOptions($pageName == Crud::PAGE_EDIT ? ['allow_delete' => false] : []);

        yield BooleanField::new('specialOfferShow', 'Ukázet hned na stránce');
    }
}
