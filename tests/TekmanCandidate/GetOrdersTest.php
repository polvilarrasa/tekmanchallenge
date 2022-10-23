<?php

use App\TekmanCandidate\Application\GetOrdersUseCase;
use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrdersRepository;
use App\TekmanCandidate\Infrastructure\Order\OrderJsonTransformer;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Uid\Uuid;

final class GetOrdersTest extends KernelTestCase
{
    private function getExpectedOutput($orders)
    {
        return [
            [
                'id' => $orders[0]->idAsString(),
                'name' => $orders[0]->name(),
            ],
            [
                'id' => $orders[1]->idAsString(),
                'name' => $orders[1]->name(),
            ],
        ];
    }

    public function testGetOrdersUseCaseCorrectOutput(): void
    {
        $orders = [
            new Order(Uuid::v4(), 'Order 1'),
            new Order(Uuid::v4(), 'Order 2'),
        ];
        
        $ordersRepository = $this->createMock(OrdersRepository::class);
        
        $ordersRepository->expects($this->any())
            ->method('findAll')
            ->willReturn($orders);
        
        $useCase = new GetOrdersUseCase(
            $ordersRepository,
            new OrderJsonTransformer()
        );

        $this->assertEquals($this->getExpectedOutput($orders), $useCase->execute());
    }
}
