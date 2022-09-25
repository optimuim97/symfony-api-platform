<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i=0; $i < 11; $i++) { 
            $user = new User();
            
            $hashed_password = $this->encoder->encodePassword($user, 'password');

            $user->setEmail($faker->email)
                 ->setPassword($hashed_password);

            $manager->persist($user);
            
            for ($a=0; $a < random_int(5, 15); $a++) { 
                $article = (new Article())
                            ->setAuthor($user)
                            ->setContent($faker->text(300))
                            ->setTitle($faker->text(50));

                $manager->persist($article);
            }
        }

        $manager->flush();
    }
}
