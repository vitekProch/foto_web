<?php

namespace App\Controller;

use App\Entity\PhotoCategories;
use App\Repository\PhotoCategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PortfolioPageController extends AbstractController
{
    #[Route('/portfolio', name: "portfolio_page")]
    public function portfolioPage(PhotoCategoriesRepository $photoCategoryRepository): Response
    {
        $categories = $photoCategoryRepository->findAll();
        return $this->render('PortfolioPage/portfolio_page.html.twig', [
            'categories' => $categories,
            'title' => 'Portfolio',
        ]);
    }
}
