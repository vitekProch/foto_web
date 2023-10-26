<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SpecialOfferPageController extends AbstractController
{
    #[Route('/special-offer', name: 'special_offer_page')]
    public function SpecialOfferPage(): Response
    {
        return $this->render('SpecialOfferPage/special_offer_page.html.twig', [
            'title' => 'Novinky',
        ]);
    }
}
