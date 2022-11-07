<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\PaintingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'portfolio')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('portfolio/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/portfolio/{slug}', name: 'portfolio.category')]
    public function category(Category $category, PaintingRepository $paintingRepository): Response
    {
        $paintings = $paintingRepository->findAllPortfolio($category);

        return $this->render('portfolio/category.html.twig', [
            'category' => $category,
            'paintings' => $paintings,
        ]);
    }
}
