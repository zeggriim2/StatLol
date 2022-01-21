<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $userPasswordEncoder;

    public function __construct(UserPasswordHasherInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $manager->persist($this->createUser($i));
        }
        $manager->flush();
    }

    private function createUser(int $index): User
    {
        $user = new User();
        $user->setEmail(sprintf("email+%d@hotmail.fr", $index))
            ->setPseudo(sprintf("pseudo+%d", $index))
        ;

        $user->setPassword($this->userPasswordEncoder->hashPassword($user, "password"));
        return $user;
    }
}
