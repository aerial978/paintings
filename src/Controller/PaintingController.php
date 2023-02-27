<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Painting;
use App\Form\CommentType;
use App\Service\CommentService;
use App\Repository\CommentRepository;
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
            $paintingRepository->findby([], ['id' => 'DESC']),
            $request->query->getInt('page', 1),
            6
        );
        
        return $this->render('painting/index.html.twig', [
            'paintings' => $paintings,
        ]);
    }

    #[Route('/painting/{slug}', name: 'painting.detail', methods: ['GET', 'POST'])]
    public function details(Painting $painting, CommentService $commentService, CommentRepository $commentRepository, Request $request): Response
    {
        $comments = $commentRepository->findComments($painting);
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();
            $commentService->persistComment($comment, null, $painting);

            $this->addFlash('success', 'Your comment has been sent, thank you. It will be sent after validation !');

            return $this->redirectToRoute('painting.detail', ['slug' => $painting->getSlug()]);
        }

        return $this->render('painting/detail.html.twig', [
            'painting' => $painting,
            'form' => $form->createView(),
            'comments' => $comments
        ]);
    }
}
