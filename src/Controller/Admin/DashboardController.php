<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Dessert;
use App\Entity\Drink;
use App\Entity\IceCream;
use App\Entity\Option;
use App\Entity\Pizza;
use App\Entity\Size;
use App\Entity\User;
use App\Entity\Wine;
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
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle("Lorenzzo's Pizza");
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('Tailles', 'fas fa-expand-alt', Size::class);
        yield MenuItem::linkToCrud('Options', 'fas fa-cog', Option::class);
        yield MenuItem::linkToCrud('Pizzas', 'fas fa-pizza-slice', Pizza::class);
        yield MenuItem::linkToCrud('Boissons', 'fas fa-glass-whiskey', Drink::class);
        yield MenuItem::linkToCrud('Vins', 'fas fa-wine-glass-alt', Wine::class);
        yield MenuItem::linkToCrud('Desserts', 'fas fa-cookie-bite', Dessert::class);
        yield MenuItem::linkToCrud('Glaces', 'fas fa-ice-cream', IceCream::class);
    }
}
