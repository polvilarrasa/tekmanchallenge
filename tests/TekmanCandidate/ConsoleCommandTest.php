<?php

use App\TekmanCandidate\Application\GetOrdersUseCase;
use App\TekmanCandidate\Domain\Order\Order;
use App\TekmanCandidate\Infrastructure\Order\OrderJsonTransformer;
use App\Tests\TekmanCandidate\Integration\Infrastructure\FakeOrdersRepository;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Uid\Uuid;

final class ConsoleCommandTest extends KernelTestCase
{
    public function testListOrdersConsoleCommandSuccessful(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('tekman:list:orders');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $commandTester->assertCommandIsSuccessful();
    }
}
