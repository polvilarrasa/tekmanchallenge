<?php

namespace App\TekmanCandidate\Infrastructure\Order;

use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrderTransformer;

class OrderJsonTransformer implements OrderTransformer
{
    public function transform(Order $order): array
    {
        return [
            'id' => $order->idAsString(),
            'name' => $order->name()
        ];
    }
}