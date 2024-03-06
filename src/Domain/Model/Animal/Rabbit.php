<?php

namespace App\Domain\Model\Animal;

use App\Domain\Model\Food\HerbivorousAnimalTrait;
use App\Domain\Model\Fur\AnimalWithFur;
use App\Domain\Model\Fur\FurTrait;

final class Rabbit implements Animal, AnimalWithFur
{
    use AnimalTrait;
    use HerbivorousAnimalTrait;
    use FurTrait;

    protected const string SPECIES = 'rabbit';
}
