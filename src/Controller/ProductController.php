<?php

namespace App\Controller;

use App\Entity\Dessert;
use App\Entity\Drink;
use App\Entity\IceCream;
use App\Entity\Pizza;
use App\Entity\Wine;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/menu', name: 'products')]
    public function index(): Response
    {
        $pizzas = $this->entityManager->getRepository(Pizza::class)->findAll();
        $desserts = $this->entityManager->getRepository(Dessert::class)->findAll();
        $iceCreams = $this->entityManager->getRepository(IceCream::class)->findAll();
        $drinks = $this->entityManager->getRepository(Drink::class)->findAll();
        $wines = $this->entityManager->getRepository(Wine::class)->findAll();


        return $this->render('product/index.html.twig', [
            'pizzas' => $pizzas,
            'desserts' => $desserts,
            'iceCreams' => $iceCreams,
            'drinks' => $drinks,
            'wines' => $wines
        ]);
    }


    #[Route('/pizza/{slug}', name: 'pizza')]
    public function pizza($slug): Response
    {
        $pizza = $this->entityManager->getRepository(Pizza::class)->findOneBySlug($slug);

        if (!$pizza) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/pizza.html.twig', [
            'pizza' => $pizza
        ]);
    }


    #[Route('/dessert/{slug}', name: 'dessert')]
    public function dessert($slug): Response
    {
        $dessert = $this->entityManager->getRepository(Dessert::class)->findOneBySlug($slug);

        if (!$dessert) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/dessert.html.twig', [
            'dessert' => $dessert
        ]);
    }


    #[Route('/glace/{slug}', name: 'iceCream')]
    public function glace($slug): Response
    {
        $iceCream = $this->entityManager->getRepository(IceCream::class)->findOneBySlug($slug);

        if (!$iceCream) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/iceCream.html.twig', [
            'iceCream' => $iceCream
        ]);
    }


    #[Route('/boisson/{slug}', name: 'drink')]
    public function drink($slug): Response
    {
        $drink = $this->entityManager->getRepository(Drink::class)->findOneBySlug($slug);

        if (!$drink) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/drink.html.twig', [
            'drink' => $drink
        ]);
    }


    #[Route('/vin/{slug}', name: 'wine')]
    public function show($slug): Response
    {
        $wine = $this->entityManager->getRepository(Wine::class)->findOneBySlug($slug);

        if (!$wine) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/wine.html.twig', [
            'wine' => $wine
        ]);
    }
}
