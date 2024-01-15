<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Contacts;
use App\Entity\Educateurs;
use App\Entity\Licenciers;
use App\Entity\MailContacts;
use App\Entity\MailsEducateurs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct( private AdminUrlGenerator $adminUrlGenerator ){    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        // return parent::index();
        $url = $this->adminUrlGenerator
        ->setController(LicenciersCrudController::class)
        ->generateUrl();

        return $this->redirect($url);
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

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
            ->setTitle('Project Directory');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categories', 'fas fa-list', Categories::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-list', Contacts::class);
        yield MenuItem::linkToCrud('Licenciés', 'fas fa-list', Licenciers::class);
        yield MenuItem::linkToCrud('Educateurs', 'fas fa-list', Educateurs::class);
        yield MenuItem::linkToCrud('Mails des Contacts', 'fas fa-list', MailContacts::class);
        yield MenuItem::linkToCrud('Mails des Educateurs', 'fas fa-list', MailsEducateurs::class);
    }
}
