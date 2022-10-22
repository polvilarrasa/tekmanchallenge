<?php

namespace App\ConsoleCommands;

use App\TekmanCandidate\Application\ListOrdersUseCase;
use App\TekmanCandidate\Domain\Order\OrdersRepository;
use App\TekmanCandidate\Infrastructure\Order\OrderConsoleTransformer;
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
        $useCase = new ListOrdersUseCase(
            $this->ordersRepository,
            new OrderConsoleTransformer()
        );

        $output->writeln($useCase->execute());
        return Command::SUCCESS;
    }
}
