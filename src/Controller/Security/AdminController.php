<?php

namespace App\Controller\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class AdminController extends EasyAdminController
{


    private $passwordEncoder;

    public function encodePassword($user)
    {
        if (!$user instanceof User || !$user->getPlainPassword()) {
            return;
        }

        // now it's work if plainPassword string was set
        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, $user->getPassword())
        );
    }
}