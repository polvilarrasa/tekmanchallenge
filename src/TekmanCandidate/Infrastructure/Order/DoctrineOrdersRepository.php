<?php

namespace App\TekmanCandidate\Infrastructure\Order;

use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrdersRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineOrdersRepository extends ServiceEntityRepository implements OrdersRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function save(Order $order): void
    {
        $this->_em->persist($order);
        $this->_em->flush();
    }
}
