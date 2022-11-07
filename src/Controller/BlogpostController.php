<?php

namespace App\Controller;

use App\Entity\Blogpost;
use App\Repository\BlogpostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogpostController extends AbstractController
{
    #[Route('/blogpost', name: 'blogpost.index')]
    public function index(BlogpostRepository $blogpostRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $blogposts = $paginator->paginate(
            $blogpostRepository->findAll(),
            $request->query->getInt('page', 1),
            6
        );
        
        return $this->render('blogpost/index.html.twig', [
            'blogposts' => $blogposts,
        ]);
    }

    #[Route('/blogpost/{slug}', name: 'blogpost.detail', methods: ['GET'])]
    public function details(Blogpost $blogpost): Response
    {
        return $this->render('blogpost/detail.html.twig', [
            'blogpost' => $blogpost,
        ]);
    }
}
