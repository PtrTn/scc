<?php

namespace App\Controller\Admin;

use App\Entity\CoachingRequest;
use App\Entity\ContactMessage;
use App\Entity\ParticipationRequest;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Scc');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Contact berichten', 'fas fa-list', ContactMessage::class);
        yield MenuItem::linkToCrud('Proeftrainingen', 'fas fa-list', ParticipationRequest::class);
        yield MenuItem::linkToCrud('Coaching verzoeken', 'fas fa-list', CoachingRequest::class);
    }
}
