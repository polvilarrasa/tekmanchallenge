<?php

namespace App\TekmanCandidate\Application;

use App\TekmanCandidate\Domain\Order\OrdersRepository;
use App\TekmanCandidate\Infrastructure\Order\OrderConsoleTransformer;

class ListOrdersUseCase
{
    private OrdersRepository $ordersRepository;
    private OrderConsoleTransformer $orderTransformer;

    public function __construct(OrdersRepository $ordersRepository, OrderConsoleTransformer $orderTransformer)
    {
        $this->ordersRepository = $ordersRepository;
        $this->orderTransformer = $orderTransformer;
    }

    public function execute()
    {
        $orders = $this->ordersRepository->findAll();

        return $this->orderTransformer->transform($orders);
    }
}
