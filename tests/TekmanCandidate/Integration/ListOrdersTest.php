<?php

use App\TekmanCandidate\Application\ListOrdersUseCase;
use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Infrastructure\Order\DoctrineOrdersRepository;
use App\TekmanCandidate\Infrastructure\Order\OrderConsoleTransformer;
use App\Tests\TekmanCandidate\Integration\Infrastructure\FakeOrdersRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Uid\Uuid;

final class ListOrdersTest extends KernelTestCase
{
    private function getExpectedOutput($orders)
    {
        return "
        ========================Tekman Candidate Begin======================

        +-------------------- Orders ----------+---------+
        | id                                   | name    |
        +--------------------------------------+---------+
        | {$orders[0]->idAsString()} | {$orders[0]->name()} |
        | {$orders[1]->idAsString()} | {$orders[1]->name()} |
        +--------------- total orders: 2 ------+---------+
        
        ========================Tekman Candidate End========================";
    }

    public function testListOrdersUseCaseCorrectOutput(): void
    {
        $fakeOrderRepository = new FakeOrdersRepository();

        $order1 = new Order(Uuid::v4(), "order 1");
        $order2 = new Order(Uuid::v4(), "order 2");

        $fakeOrderRepository->save($order1);
        $fakeOrderRepository->save($order2);
        
        $useCase = new ListOrdersUseCase(
            $fakeOrderRepository,
            new OrderConsoleTransformer()
        );

        $this->assertEquals($this->getExpectedOutput(array($order1, $order2)), $useCase->execute());
    }
}
