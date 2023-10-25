<?php

namespace App\Controller\Admin;

use App\Entity\PhotoCategories;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PhotoCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PhotoCategories::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('categoryName', 'Název kategorie');
        yield ImageField::new('CategoryPhotoPath', 'Náhled obrázku kategorie')
            ->setBasePath('uploads/categories')
            ->setUploadDir('public/uploads/categories')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPageTitle('index','Kategorie fotografií')
            ->setPageTitle('edit','Upravit kategorii fotografií')
            ->setPageTitle('new','Přidat kategorii fotografií');
    }
}
