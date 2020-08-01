<?php

namespace App\Controller\Dashboard;


use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use Symfony\Component\Stopwatch\Section;



class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin",name="admin")
     */
    public function index(): Response
    {
      //return parent::index();
        return $this->render('dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
           ->setTitle('<img src="../images/DevBrains404.png" width="50">DevBrains404<span class="text-small"></span>');

    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('General');
        yield MenuItem::linkToCrud('Categories', 'fa fa-inbox', Category::class);
        yield MenuItem::section('Settings');
        if ($this->isGranted('ROLE_ADMIN')) {

            yield MenuItem::linkToCrud('Users', 'fa fa-users', User::class);
       }
    }








}
