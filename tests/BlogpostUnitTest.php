<?php

namespace App\Tests;

use App\Entity\Blogpost;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogpost = new blogpost();
        $datetimeimmutable = new DateTimeImmutable();

        $blogpost->setTitle('name')
            ->setContent('content')
            ->setSlug('slug')
            ->setCreatedAt($datetimeimmutable);

        $this->assertTrue($blogpost->getTitle() === 'name');
        $this->assertTrue($blogpost->getContent() === 'content');
        $this->assertTrue($blogpost->getSlug() === 'slug');
        $this->assertTrue($blogpost->getCreatedAt() === $datetimeimmutable);
    }

    public function testIsFalse()
    {
        $blogpost = new blogpost();
        $datetimeimmutable = new DateTimeImmutable();

        $blogpost->setTitle('name')
            ->setContent('content')
            ->setSlug('slug')
            ->setCreatedAt($datetimeimmutable);

        $this->assertFalse($blogpost->getTitle() === 'false');
        $this->assertFalse($blogpost->getContent() === 'false');
        $this->assertFalse($blogpost->getSlug() === 'false');
        $this->assertFalse($blogpost->getCreatedAt() === new DateTimeImmutable());
    }

    public function testIsEmpty()
    {
        $blogpost = new blogpost();

        $this->assertEmpty($blogpost->getTitle());
        $this->assertEmpty($blogpost->getContent());
        $this->assertEmpty($blogpost->getSlug());
        $this->assertEmpty($blogpost->getCreatedAt());
    }
}