<?php

namespace App\Tests;

use App\Entity\Painting;
use App\Entity\User;
use App\Entity\Category;
use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class PaintingUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $painting = new Painting();
        $datetimeimmutable = new DateTimeImmutable();
        $datetime = new Datetime();
        $category = new Category();
        $user = new User();

        $painting->setName('name')
            ->setLength(20,20)
            ->setHeight(20,20)
            ->setOnSale(true)
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetimeimmutable)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategory($category)
            ->setPrice(20,20)
            ->setUser($user);


        $this->assertTrue($painting->getName() === 'name');
        $this->assertTrue($painting->getLength() == 20,20);
        $this->assertTrue($painting->getHeight() == 20,20);
        $this->assertTrue($painting->getOnSale() === true);
        $this->assertTrue($painting->getDateRealisation() === $datetime);
        $this->assertTrue($painting->getCreatedAt() === $datetimeimmutable);
        $this->assertTrue($painting->getDescription() === 'description');
        $this->assertTrue($painting->getPortfolio() === true);
        $this->assertTrue($painting->getSlug() === 'slug');
        $this->assertTrue($painting->getFile() === 'file');
        $this->assertTrue($painting->getPrice() == 20,20);
        $this->assertContains($category, $painting->getCategory());
        $this->assertTrue($painting->getUser() === $user);
    }

    public function testIsFalse()
    {
        $painting = new painting();
        $datetimeimmutable = new DateTimeImmutable();
        $datetime = new Datetime();
        $category = new Category();
        $user = new User();

        $painting->setName('name')
            ->setLength(20.20)
            ->setHeight(20.20)
            ->setOnSale(true)
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetimeimmutable)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategory($category)
            ->setPrice(20,20)
            ->setUser($user);

        $this->assertFalse($painting->getName() === 'false');
        $this->assertFalse($painting->getLength() == false);
        $this->assertFalse($painting->getHeight() == false);
        $this->assertFalse($painting->getOnSale() === false);
        $this->assertFalse($painting->getDateRealisation() === new DateTime());
        $this->assertFalse($painting->getCreatedAt() === new DateTimeImmutable);
        $this->assertFalse($painting->getDescription() === 'false');
        $this->assertFalse($painting->getPortfolio() === false);
        $this->assertFalse($painting->getSlug() === 'false');
        $this->assertFalse($painting->getFile() === 'false');
        $this->assertFalse($painting->getPrice() == false);
        $this->assertNotContains(new Category(), $painting->getCategory());
        $this->assertFalse($painting->getUser() === new User());
    }

    public function testIsEmpty()
    {
        $category = new painting();

        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getLength());
        $this->assertEmpty($category->getHeight());
        $this->assertEmpty($category->getOnSale());
        $this->assertEmpty($category->getDateRealisation());
        $this->assertEmpty($category->getCreatedAt());
        $this->assertEmpty($category->getDescription());
        $this->assertEmpty($category->getPortfolio());
        $this->assertEmpty($category->getSlug());
        $this->assertEmpty($category->getFile());
        $this->assertEmpty($category->getPrice());
        $this->assertEmpty($category->getCategory());
        $this->assertEmpty($category->getUser());
    }
}