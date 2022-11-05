<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Category;
use App\Entity\Painting;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public Generator $faker;
    
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    
    public function load(ObjectManager $manager): void
    {
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        // Création d'un utilisateur
        $user = new User();

        $user->setEmail('user@test.com')
            ->setFirstName($faker->firstName())
            ->setName($faker->lastName())
            ->setRoles(['ROLE_PAINTER'])
            ->setPhoneNumber($faker->phoneNumber())
            ->setAbout($faker->text())
            ->setInstagram('instagram')
            ->setRoles(['ROLE_PAINTER']);

        $password = $this->hasher->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        // Création de 10 blogpost
        for ($i=0; $i < 10; $i++) {
            $blogpost = new Blogpost();

            $blogpost->setTitle($faker->words(3, true))
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContent($faker->text(350))
                ->setSlug($faker->slug(3))
                ->setUser($user);

        $manager->persist($blogpost);
        }

        // Création de 5 catégories
        for ($k=0; $k < 5; $k++) {
            $category = new Category();

            $category->setName($faker->word())
                ->setDescription($faker->words(10, true))
                ->setSlug($faker->slug());

            $manager->persist($category);

            // Création de 2 peintures/catégories
            for ($j=0; $j < 2; $j++) {
                $painting = new Painting();

                $painting->setName($faker->words(3, true))
                    ->setLength($faker->randomFloat(2, 20, 60))
                    ->setHeight($faker->randomFloat(2, 20, 60))
                    ->setOnSale($faker->randomElement([true, false]))
                    ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now', null))
                    ->setDescription($faker->text())
                    ->setPortfolio($faker->randomElement([true, false]))
                    ->setSlug($faker->slug())
                    ->setFile('../../assets/images/image1.jpeg')
                    ->addCategory($category)
                    ->setPrice($faker->randomFloat(2, 100, 9999))
                    ->setUser($user);

                $manager->persist($painting);
            }
        }
        $manager->flush();
    }   
}
