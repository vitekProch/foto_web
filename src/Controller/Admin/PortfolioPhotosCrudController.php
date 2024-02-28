<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Fields\MultipleImageField;
use App\EasyAdmin\MultiUploadImages\MultiuploadImages;
use App\Entity\PortfolioPhotos;
use App\Repository\PortfolioPhotosRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\BatchActionDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Response;

class PortfolioPhotosCrudController extends AbstractCrudController
{
    private PortfolioPhotosRepository $photosRepository;
    private MultiuploadImages $uploadHelper;

    public static function getEntityFqcn(): string
    {
        return PortfolioPhotos::class;
    }

    public function __construct(PortfolioPhotosRepository $photosRepository, MultiuploadImages $uploadHelper)
    {
        $this->photosRepository = $photosRepository;
        $this->uploadHelper = $uploadHelper;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();

        yield ImageField::new('PortfolioPhotoName')
            ->hideWhenCreating()
            ->setBasePath('uploads/portfolioPhoto')
            ->setRequired(true)
            ->setUploadDir('public/uploads/portfolioPhoto');

        yield MultipleImageField::new('PortfolioPathFile')
            ->setRequired(true)
            ->setFormTypeOption('multiple', true);

        yield AssociationField::new('photoCategory')
            ->setRequired(true)
            ->hideOnIndex()
            ->setFormTypeOption('choice_label', 'categoryName');

        yield TextField::new('photoCategoryName')
            ->onlyOnIndex();

        yield TextField::new('portfolioAlt')
            ->onlyWhenUpdating();
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $filesArray = parent::getContext()->getRequest()->files->get('PortfolioPhotos')['PortfolioPathFile'];
        foreach($filesArray as $file)
        {
            $uniqueImageName = $this->uploadHelper->generateUniqueFileName($file->getClientOriginalName());
            $peopleReviews = (new PortfolioPhotos())
                ->setPhotoCategory($entityInstance->getPhotoCategory())
                ->setPortfolioAlt($entityInstance->getPhotoCategory()->getCategoryName())
                ->setPortfolioPhotoName($uniqueImageName);

            $this->uploadHelper->upload($file, $uniqueImageName, 'uploads/portfolioPhoto');
            $entityManager->persist($peopleReviews);
        }
        $entityManager->flush();
    }

    public function batchDelete(AdminContext $context, BatchActionDto $batchActionDto): Response
    {
        foreach ($batchActionDto->getEntityIds() as $entityId) {
            $entityToRemove = $this->photosRepository->find($entityId);
            $reviewToRemovePath = $entityToRemove->getPortfolioPhotoPath();
            $this->uploadHelper->deletePhotoFromDirectory($reviewToRemovePath);
        }
        return parent::batchDelete($context, $batchActionDto); // TODO: Change the autogenerated stub
    }

    public function delete(AdminContext $context): Response
    {
        $imgPath = $context->getEntity()->getInstance()->getPortfolioPhotoPath();
        $this->uploadHelper->deletePhotoFromDirectory($imgPath);
        return parent::delete($context); // TODO: Change the autogenerated stub
    }
}
