<?php

namespace App\TekmanCandidate\Domain\Order;

interface OrdersRepository
{
    public function save(Order $order): void;

    public function find(int $id): ?Order;

    public function findAll(): array;
}