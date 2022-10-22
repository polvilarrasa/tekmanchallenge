<?php

namespace App\TekmanCandidate\Domain\Order;

use App\Shared\Domain\AggregateRoot;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity()
 */
class Order extends AggregateRoot
{
    /**
     * @ORM\Column(type="uuid")
     */
    private Uuid $id;
    
    /**
     * @ORM\Column(type="string", length=20)
     */
    private string $name;

    public function __construct(Uuid $id, string $name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException("Order name cannot be empty");
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

    public function name(): string
    {
        return $this->name;
    }
}
