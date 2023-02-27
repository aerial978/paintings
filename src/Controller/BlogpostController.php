<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Blogpost;
use App\Form\CommentType;
use App\Service\CommentService;
use App\Repository\CommentRepository;
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
            $blogpostRepository->findby([], ['id' => 'DESC']),
            $request->query->getInt('page', 1),
            6
        );
        
        return $this->render('blogpost/index.html.twig', [
            'blogposts' => $blogposts,
        ]);
    }

    #[Route('/blogpost/{slug}', name: 'blogpost.detail', methods: ['GET', 'POST'])]
    public function details(Blogpost $blogpost, CommentService $commentService, CommentRepository $commentRepository, Request $request): Response
    {
        $comments = $commentRepository->findComments($blogpost);
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();
            $commentService->persistComment($comment, $blogpost, null);

            $this->addFlash('success', 'Your comment has been sent, thank you. It will be sent after validation !');

            return $this->redirectToRoute('blogpost.detail', ['slug' => $blogpost->getSlug()]);
        }

        return $this->render('blogpost/detail.html.twig', [
            'blogpost' => $blogpost,
            'form' => $form->createView(),
            'comments' => $comments
        ]);
    }
}
