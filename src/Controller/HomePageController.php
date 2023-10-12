<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homePage(): Response
    {
        return $this->render('Homepage/homepage.html.twig', [
            'title' => 'Domov',
        ]);
    }
}
