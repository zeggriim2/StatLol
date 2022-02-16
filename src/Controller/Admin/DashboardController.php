<?php

namespace App\Controller\Admin;

use App\Entity\Division;
use App\Entity\Queue;
use App\Entity\Tier;
use App\Entity\Version;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(TierCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('StatLol');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section("Initialisation",'fas fa-home');
        yield MenuItem::subMenu("Tier", 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud("Add", 'fas fa-plus', Tier::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud("Liste", 'fas fa-plus', Tier::class)->setAction(Crud::PAGE_INDEX),
        ]);
        yield MenuItem::subMenu("Division", 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud("Add", 'fas fa-plus', Division::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud("Liste", 'fas fa-plus', Division::class)->setAction(Crud::PAGE_INDEX),
        ]);
        yield MenuItem::subMenu("Queue", 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud("Add", 'fas fa-plus', Queue::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud("Liste", 'fas fa-plus', Queue::class)->setAction(Crud::PAGE_INDEX),
        ]);
        yield MenuItem::subMenu("Version", 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud("Add", 'fas fa-plus', Version::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud("Liste", 'fas fa-plus', Version::class)->setAction(Crud::PAGE_INDEX),
        ]);
        // yield MenuItem::subMenu("Initialisation", "fas fa-infinity")->setSubItems([
        //     MenuItem::linkToCrud('Tier', 'fas fa-list', Tier::class),
        //     MenuItem::linkToCrud('Division', 'fas fa-list', Division::class),
        //     MenuItem::linkToCrud('Queue', 'fas fa-list', Queue::class),
        //     MenuItem::linkToCrud('Version', 'fas fa-list', Version::class),
        // ]);
    }
}
