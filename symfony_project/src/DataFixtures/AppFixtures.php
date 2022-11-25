<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {

    }

    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setUsername('paul');
        $user1->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user1,
                'coucou'
            )
        );


        $manager->persist($user1);

        $manager->flush();
    }
}
