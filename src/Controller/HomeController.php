<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use App\Repository\PaintingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home.index')]
    public function index(PaintingRepository $paintingRepository, BlogpostRepository $blogpostRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'paintings' => $paintingRepository->lastThree(),
            'blogposts' => $blogpostRepository->lastThree(),
        ]);
    }
}