<?php

namespace App\TekmanCandidate\Domain\Order;

use Symfony\Component\Uid\Uuid;

class Order
{
    private Uuid $id;
    
    private string $name;

    public function __construct(Uuid $id, string $name)
    {
        if (empty($name)) {
            throw new OrderNameBlankException("Order name cannot be empty");
        }
        // length name greater than 20
        if (strlen($name) > 20) {
            throw new OrderNameLengthException("Order name cannot be longer than 20 characters");
        }
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function idAsString(): string
    {
        return $this->id->toRfc4122();
    }

    public function name(): string
    {
        return $this->name;
    }
}
