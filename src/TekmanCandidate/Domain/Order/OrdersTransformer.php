<?php

namespace App\TekmanCandidate\Domain\Order;

interface OrdersTransformer
{
    public function transform(array $orders): string;
}