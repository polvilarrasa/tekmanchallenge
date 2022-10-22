<?php

namespace App\Tests\TekmanCandidate\Integration\Infrastructure;

use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrdersRepository;

class FakeOrdersRepository implements OrdersRepository
{
    private array $orders = [];

    public function save(Order $order): void
    {
        $this->orders[] = $order;
    }

    public function findAll()
    {
        return $this->orders;
    }
}
