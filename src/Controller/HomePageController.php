<?php

namespace App\Controller;

use App\Entity\PhotoCategories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(EntityManagerInterface $entityManager): Response
    {
        $categoryRepository = $entityManager->getRepository(PhotoCategories::class);
        $categories = $categoryRepository->findAll();
        return $this->render('Homepage/homepage.html.twig', [
            'title' => 'Vidíííš vše? Co vidíííím já? ',
            'categories' => $categories,
        ]);
    }

}
