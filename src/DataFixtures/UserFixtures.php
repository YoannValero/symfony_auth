<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {

        $this->passwordEncoder = $passwordEncoder;
    }
    

    public function load(ObjectManager $manager)
    {

        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail('yoyo@gmail.com');
        
        $hash = $this->passwordEncoder->encodePassword($user, 'mama');

        $user->setPassword($hash);
      

        $manager->persist($user);
        $manager->flush();
    }
}
