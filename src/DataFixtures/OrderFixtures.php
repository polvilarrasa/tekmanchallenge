<?php

namespace App\DataFixtures;

use App\TekmanCandidate\Domain\Order\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $order1 = new Order(Uuid::v4(), "order 1");
        $order2 = new Order(Uuid::v4(), "order 2");

        $manager->persist($order1);
        $manager->persist($order2);

        $manager->flush();
    }
}
