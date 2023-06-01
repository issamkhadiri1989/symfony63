<?php

namespace App\DataFixtures;

use App\Factory\CollaboratorFactory;
use App\Factory\ManagerFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ManagerFactory::createMany(4);
        CollaboratorFactory::createMany(10);


        $manager->flush();
    }
}
