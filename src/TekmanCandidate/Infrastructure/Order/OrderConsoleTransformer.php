<?php

namespace App\TekmanCandidate\Infrastructure\Order;

use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrdersTransformer;

class OrderConsoleTransformer implements OrdersTransformer
{
    /** @return array<string, string> */
    public function transform(array $orders): string
    {
        $result = "
        ========================Tekman Candidate Begin======================

        +-------------------- Orders ----------+---------+
        | id                                   | name    |
        +--------------------------------------+---------+
        ";
        foreach ($orders as $order) {
            $result .= "| {$order->idAsString()} | {$order->name()} |
        ";
        }
        
        $totalOrders = count($orders);

        $result .= "+--------------- total orders: $totalOrders ------+---------+
        
        ========================Tekman Candidate End========================";

        return $result;
    }
}