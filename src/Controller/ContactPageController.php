<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ContactPageController extends AbstractController
{
    #[Route('/contact', name: 'contact_page')]
    public function ContactPage(): Response
    {
        return $this->render('ContactPage/contact_page.html.twig', [
            'title' => 'Kontakt',
        ]);
    }
}
