<?php

namespace App\Controller;

use App\Entity\PhotoCategories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminPageController extends AbstractController
{
    #[Route('/admin/categories/new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $cotegory = new PhotoCategories();
        $cotegory->setCategoryName('glamour');
        $cotegory->setCategoryPhotoPath('interesting/path/url');
        $entityManager->persist($cotegory);
        $entityManager->flush();

        return new Response(sprintf(
            'Vše asik proběhlo tak jak má uložil jsi do tohoto id: %d kategorii s názvem: %d... Pry :D',
            $cotegory->getId(),
            $cotegory->getCategoryName()
        ));
    }

    #[Route('/admin/categories')]
    public function categories(EntityManagerInterface $entityManager): Response
    {
        $cotegoryRepository = $entityManager->getRepository(PhotoCategories::class);
        $cotegories = $cotegoryRepository->findAll();
        return $this->render('AdminPage/EditCategories/edit_categories.html.twig', [
            'categories' => $cotegories,
        ]);
    }
}
