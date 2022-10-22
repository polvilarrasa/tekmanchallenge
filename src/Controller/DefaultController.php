<?php

namespace App\Controller;

use App\TekmanCandidate\Application\GetOrdersUseCase;
use App\TekmanCandidate\Infrastructure\Order\DoctrineOrdersRepository;
use App\TekmanCandidate\Infrastructure\Order\OrderJsonTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/orders', name: 'get_orders', methods: ['GET'])]
    public function index(DoctrineOrdersRepository $doctrineOrdersRepository): JsonResponse
    {
        $useCase = new GetOrdersUseCase(
            $doctrineOrdersRepository,
            new OrderJsonTransformer()
        );

        return new JsonResponse($useCase->execute());
    }
}
