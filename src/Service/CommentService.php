<?php

namespace App\Service;

use App\Entity\Comment;
use App\Entity\Blogpost;
use App\Entity\Painting;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class CommentService
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function persistComment(Comment $comment, Blogpost $blogpost = null, Painting $painting = null): void
    {
        $comment->setIsPublished(false)
                ->setBlogpost($blogpost)
                ->setPainting($painting)
                ->setCreatedAt(new DateTimeImmutable('now'));

        $this->manager->persist($comment);
        $this->manager->flush();
    }
}