<?php

namespace App\TekmanCandidate\Infrastructure;

use App\Shared\Infrastructure\DoctrineRepository;
use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrdersRepository;

final class DoctrineOrdersRepository extends DoctrineRepository implements OrdersRepository
{
    /**
     * @param Order $order
     */
    public function save(Order $order): void
    {
        $this->persist($order);
    }

    /**
     * @param int $id
     * @return Order|null
     */
    public function find(int $id): ?Order
    {
        return $this->repository(Order::class)->find($id);
    }

    /**
     * @return array<int, Order>
     */
    public function findAll(): array
    {
        return $this->repository(Order::class)->findAll();
    }
}