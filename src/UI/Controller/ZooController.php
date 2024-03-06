<?php

namespace App\UI\Controller;

use App\Domain\Model\Animal\Elephant;
use App\Domain\Model\Animal\Fox;
use App\Domain\Model\Animal\Rabbit;
use App\Domain\Model\Animal\Rhino;
use App\Domain\Model\Animal\SnowIrbis;
use App\Domain\Model\Animal\Tiger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ZooController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): JsonResponse
    {
        $animals = [];
        $animals[] = (string) new Elephant('Słonik');
        $animals[] = (string) new Fox('Lisek');
        $animals[] = (string) new Rabbit('Króliczek');
        $animals[] = (string) new Rhino('Nosorożec');
        $animals[] = (string) new SnowIrbis('Irbisek');
        $animals[] = (string) new Tiger('Tygrysek');

        return new JsonResponse($animals);
    }
}
