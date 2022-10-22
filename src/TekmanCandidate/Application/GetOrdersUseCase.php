<?php

namespace App\TekmanCandidate\Application;

use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrdersRepository;
use App\TekmanCandidate\Infrastructure\Order\OrderJsonTransformer;

class GetOrdersUseCase
{
    private OrdersRepository $ordersRepository;
    private OrderJsonTransformer $orderTransformer;

    public function __construct(OrdersRepository $ordersRepository, OrderJsonTransformer $orderTransformer)
    {
        $this->ordersRepository = $ordersRepository;
        $this->orderTransformer = $orderTransformer;
    }

    public function execute(): array
    {
        $orders = $this->ordersRepository->findAll();

        return array_map(function (Order $order) {
            return $this->orderTransformer->transform($order);
        }, $orders);
    }
}
