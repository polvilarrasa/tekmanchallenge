<?php

namespace App\TekmanCandidate\Domain\Order;

interface OrderTransformer
{
    public function transform(Order $order): array;
}