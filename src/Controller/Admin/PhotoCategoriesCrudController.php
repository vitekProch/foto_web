<?php

namespace App\Controller\Admin;

use App\Entity\PhotoCategories;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
        yield TextField::new('CategoryName' , 'Název kategorie');
        yield ImageField::new('CategoryPhotoPath', 'Umístění obrázku')
            ->setBasePath('uploads/categories')
            ->setUploadDir('public/uploads/categories');
    }
}
