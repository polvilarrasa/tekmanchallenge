<?php

use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrderNameBlankException;
use App\TekmanCandidate\Domain\Order\OrderNameLengthException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

final class OrderTest extends TestCase
{
    public function testOrderConstructedCorrectly(): void
    {
        $id = Uuid::v4();
        $name = "test";

        $order = new Order($id, $name);
        
        $this->assertEquals($id, $order->id());
        $this->assertEquals($name, $order->name());
    }

    public function testOrderNameCannotBeEmpty(): void
    {
        $id = Uuid::v4();
        $name = "";

        $this->expectException(OrderNameBlankException::class);
        $order = new Order($id, $name);
    }

    public function testOrderNameCannotBeLongerThan20Characters(): void
    {
        $id = Uuid::v4();
        $name = "123456789012345678901";

        $this->expectException(OrderNameLengthException::class);
        $order = new Order($id, $name);
    }
}
