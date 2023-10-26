<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PortfolioPageController extends AbstractController
{
    #[Route('/portfolio', name: "portfolio_page")]
    public function portfolioPage(): Response
    {
        return $this->render('PortfolioPage/portfolio_page.html.twig', [
            'title' => 'Portfolio',
        ]);
    }
}
