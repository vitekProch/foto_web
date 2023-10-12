<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutMeController extends AbstractController
{
    #[Route('/about-me')]
    public function aboutMePage()
    {
        die('Chello Word');
    }
}
