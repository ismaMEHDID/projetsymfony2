<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Photo;
use App\Entity\Categorie;
use App\Entity\Album;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator){
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $url = $this->adminUrlGenerator
            ->setController(PhotoCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('WebSite Photographe');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Gestion du portfolio');

        yield MenuItem::subMenu('Les photos', 'fas fa-bars')->setSubItems([

            MenuItem::linkToCrud('Ajouter une photo', 'fas fa-plus', Photo::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les photos', 'fas fa-eye', Photo::class)

        ]);

        yield MenuItem::subMenu('Catégorie des photos', 'fas fa-bars')->setSubItems([

            MenuItem::linkToCrud('Ajouter une catégorie', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les catégories', 'fas fa-eye', Categorie::class)

        ]);

        yield MenuItem::subMenu('Albums des photos', 'fas fa-bars')->setSubItems([

            MenuItem::linkToCrud('Ajouter un album', 'fas fa-plus', Album::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les albums', 'fas fa-eye', Album::class)

        ]);










    }
}
