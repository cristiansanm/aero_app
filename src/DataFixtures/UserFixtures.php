<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const USUARIO_ADMIN_REFERENCIA = 'user-admin';
    public const USUARIO_USER_REFERENCIA = 'user-user';
    
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $usuario = new User();
        $usuario->setEmail('cristian.admin@aero.es');
        $usuario->setRoles(['ROLE_ADMIN']);
        $usuario->setNombre('Cristian');
        $usuario->setPassword(
            $this->userPasswordEncoder->encodePassword($usuario, 'admin'));
        
        $manager->persist($usuario);
        $manager->flush();
        $this->addReference(self::USUARIO_ADMIN_REFERENCIA, $usuario);

        $usuario1 = new User();
        $usuario1->setEmail('arley.user@aero.es');
        $usuario1->setRoles(['ROLE_USER']);
        $usuario1->setNombre('Arley');
        $usuario1->setPassword(
            $this->userPasswordEncoder->encodePassword($usuario1, '1234'));
        
        $manager->persist($usuario1);
        $manager->flush();
        $this->addReference(self::USUARIO_USER_REFERENCIA, $usuario1);
    }
}
