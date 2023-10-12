<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomePageController extends AbstractController
{
    #[Route('/')]
    public function homePage(): Response
    {
        return $this->render('HomePage/home_page.html.twig', [
            'title' => 'Domov',
        ]);
    }
}
