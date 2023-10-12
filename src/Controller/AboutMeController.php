<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AboutMeController extends AbstractController
{
    #[Route('/about-me')]
    public function aboutMePage(): Response
    {
        return $this->render('AboutMe/about_me_page.html.twig', [
            'title' => 'O mně',
        ]);
    }
}
