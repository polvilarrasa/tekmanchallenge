<?php

namespace App\ConsoleCommands;

use App\TekmanCandidate\Application\GetOrdersUseCase;
use App\TekmanCandidate\Domain\Order\OrdersRepository;
use App\TekmanCandidate\Infrastructure\Order\OrderJsonTransformer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListOrdersCommand extends Command
{
    private OrdersRepository $ordersRepository;

    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
        
        parent::__construct("tekman:list:orders");
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Lists order from database')
            ->setHelp('This command allows you to list orders from database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $useCase = new GetOrdersUseCase(
            $this->ordersRepository,
            new OrderJsonTransformer()
        );

        $orders = $useCase->execute();

        $output->writeln($this->printOrders($orders));

        return Command::SUCCESS;
    }

    private function printOrders(array $orders): string
    {
        $result = "
        ========================Tekman Candidate Begin======================

        +-------------------- Orders ----------+---------+
        | id                                   | name    |
        +--------------------------------------+---------+
        ";
        foreach ($orders as $order) {
            $result .= "| {$order['id']} | {$order['name']} |
        ";
        }
        
        $totalOrders = count($orders);

        $result .= "+--------------- total orders: $totalOrders ------+---------+
        
        ========================Tekman Candidate End========================";

        return $result;
    }
}
