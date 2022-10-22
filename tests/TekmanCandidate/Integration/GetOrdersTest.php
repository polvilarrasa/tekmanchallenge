<?php

use App\TekmanCandidate\Application\GetOrdersUseCase;
use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Infrastructure\Order\OrderJsonTransformer;
use App\Tests\TekmanCandidate\Integration\Infrastructure\FakeOrdersRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Uid\Uuid;

final class GetOrdersTest extends KernelTestCase
{
    private function getExpectedOutput($orders)
    {
        return [
            [
                'id' => $orders[0]->idAsString(),
                'name' => $orders[0]->name()
            ],
            [
                'id' => $orders[1]->idAsString(),
                'name' => $orders[1]->name()
            ]
        ];
    }

    public function testGetOrdersUseCaseCorrectOutput(): void
    {
        $fakeOrderRepository = new FakeOrdersRepository();

        $order1 = new Order(Uuid::v4(), "order 1");
        $order2 = new Order(Uuid::v4(), "order 2");

        $fakeOrderRepository->save($order1);
        $fakeOrderRepository->save($order2);
        
        $useCase = new GetOrdersUseCase(
            $fakeOrderRepository,
            new OrderJsonTransformer()
        );

        $this->assertEquals($this->getExpectedOutput(array($order1, $order2)), $useCase->execute());
    }
}
