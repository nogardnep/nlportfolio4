<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("maitre");
        $user->setDisplayedName("Le maître");
        $user->setEmail("contact@nicolaslouin.fr");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'maitre'
        ));
        $manager->persist($user);

        $manager->flush();
    }
}
