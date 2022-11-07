<?php

namespace App\Controller;

use App\Entity\Painting;
use App\Repository\PaintingRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaintingController extends AbstractController
{
    #[Route('/painting', name: 'painting.index', methods: ['GET'])]
    public function index(PaintingRepository $paintingRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $paintings = $paginator->paginate(
            $paintingRepository->findAll(),
            $request->query->getInt('page', 1),
            6
        );
        
        return $this->render('painting/index.html.twig', [
            'paintings' => $paintings,
        ]);
    }

    #[Route('/painting/{slug}', name: 'painting.details', methods: ['GET'])]
    public function details(Painting $painting): Response
    {
        return $this->render('painting/details.html.twig', [
            'painting' => $painting,
        ]);
    }
}
