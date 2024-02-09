<?php

namespace App\Controller;


use App\Repository\PhotoPackageNamesRepository;
use App\Repository\WeddingPhotoPackagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PriceListPageController extends AbstractController
{
    #[Route('/price-list', name: 'price_list_page')]
    public function priceListPage(PhotoPackageNamesRepository $packageNamesRepository, WeddingPhotoPackagesRepository $weddingPhotoPackagesRepository): Response
    {
        $data = $weddingPhotoPackagesRepository->findAll();

        return $this->render('PriceListPage/price_list_page.html.twig', [
            'title' => 'Ceník',
            'smallPriceList' => $packageNamesRepository->findAll(),
            'weddingPriceList' => $weddingPhotoPackagesRepository->findAll(),
        ]);
    }
}
