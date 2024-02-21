<?php

namespace App\Controller\Admin;

use App\Entity\PackageItem;
use App\Entity\PeopleReviews;
use App\Entity\PhotoCategories;
use App\Entity\PhotoPackageNames;
use App\Entity\PortfolioPhotos;
use App\Entity\SubPackage;
use App\Entity\User;
use App\Entity\WeddingPackage;
use App\Entity\WeddingPhotoItem;
use App\Entity\WeddingPhotoPackage;
use App\Entity\WeddingPhotoType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(PhotoCategoriesCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        //return $this->render('AdminPage/admin_page.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hlavní administrace');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Hlavní stránka', 'fa fa-home', $this->generateUrl('homepage'));
        yield MenuItem::linkToCrud('Úprava kategorií', 'fa fa-home', PhotoCategories::class);
        yield MenuItem::linkToCrud('Úprava portfolia', 'fa fa-home', PortfolioPhotos::class);
        yield MenuItem::linkToCrud('Reviews', 'fa fa-home', PeopleReviews::class);
        yield MenuItem::linkToCrud('Položky svatebních balíčků', 'fa fa-home', WeddingPackage::class);
        yield MenuItem::linkToCrud('Itemy svatebních balíčků', 'fa fa-home', PackageItem::class);
        yield MenuItem::linkToCrud('Položky normálních balíčků', 'fa fa-home', PhotoPackageNames::class);
        yield MenuItem::linkToCrud('Uživatelé', 'fas fa-users', User::class)
            ->setPermission('ROLE_SUPER_ADMIN');
    }

    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('admin');
    }
}
