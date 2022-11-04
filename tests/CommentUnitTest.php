<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\Comment;
use App\Entity\Painting;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class CommentUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogpost = new blogpost();
        $datetimeimmutable = new DateTimeImmutable();
        $comment = new Comment();
        $painting = new Painting();

        $comment->setAuthor('author')
            ->setEmail('email@test.com')
            ->setContent('content')
            ->setCreatedAt($datetimeimmutable)
            ->setBlogpost($blogpost)
            ->setPainting($painting);

        $this->assertTrue($comment->getAuthor() === 'author');
        $this->assertTrue($comment->getEmail() === 'email@test.com');
        $this->assertTrue($comment->getContent() === 'content');
        $this->assertTrue($comment->getCreatedAt() === $datetimeimmutable);
        $this->assertTrue($comment->getblogpost() === $blogpost);
        $this->assertTrue($comment->getPainting() === $painting);
    }

    public function testIsFalse()
    {
        $blogpost = new blogpost();
        $datetimeimmutable = new DateTimeImmutable();
        $comment = new Comment();
        $painting= new Painting();

        $comment->setAuthor('false')
            ->setEmail('false@test.com')
            ->setContent('false')
            ->setCreatedAt(new DateTimeImmutable())
            ->setBlogpost(new Blogpost())
            ->setPainting (new Painting());

        $this->assertFalse($comment->getAuthor() === 'author');
        $this->assertFalse($comment->getEmail() === 'email@test.com');
        $this->assertFalse($comment->getContent() === 'content');
        $this->assertFalse($comment->getCreatedAt() === new DateTimeImmutable);
        $this->assertFalse($comment->getBlogpost() === $blogpost);
        $this->assertFalse($comment->getPainting() === $painting);
    }

    public function testIsEmpty()
    {
        $comment = new comment();

        $this->assertEmpty($comment->getAuthor());
        $this->assertEmpty($comment->getEmail());
        $this->assertEmpty($comment->getContent());
        $this->assertEmpty($comment->getCreatedAt());
        $this->assertEmpty($comment->getblogpost());
        $this->assertEmpty($comment->getPainting());
    }
}