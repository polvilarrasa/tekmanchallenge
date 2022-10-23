<?php

use App\ConsoleCommands\ListOrdersCommand;
use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Domain\Order\OrdersRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Uid\Uuid;

final class ListOrdersCommandTest extends TestCase
{
    public function testListOrdersConsoleCommandSuccessful(): void
    {
        $orders = [
            new Order(Uuid::v4(), 'Order 1'),
            new Order(Uuid::v4(), 'Order 2'),
        ];
        
        $ordersRepository = $this->createMock(OrdersRepository::class);
        
        $ordersRepository->expects($this->any())
            ->method('findAll')
            ->willReturn($orders);

        $command = new ListOrdersCommand($ordersRepository);
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);
        $output = $commandTester->getDisplay();

        $this->assertEquals($this->getExpectedOutput($orders), $output);
    }

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
        
        ========================Tekman Candidate End========================\n";
    }
}
