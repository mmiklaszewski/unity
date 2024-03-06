<?php

namespace App\Domain\Model\Animal;

use App\Domain\Model\Food\CarnivorousAnimalTrait;
use App\Domain\Model\Fur\AnimalWithFur;
use App\Domain\Model\Fur\FurTrait;

final class SnowIrbis implements Animal, AnimalWithFur
{
    use AnimalTrait;
    use CarnivorousAnimalTrait;
    use FurTrait;

    protected const string SPECIES = 'snow_irbis';
}
