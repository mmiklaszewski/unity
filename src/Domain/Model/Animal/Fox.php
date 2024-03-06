<?php

namespace App\Domain\Model\Animal;

use App\Domain\Model\Food\OmnivorousAnimalTrait;
use App\Domain\Model\Fur\AnimalWithFur;
use App\Domain\Model\Fur\FurTrait;

final class Fox implements Animal, AnimalWithFur
{
    use AnimalTrait;
    use OmnivorousAnimalTrait;
    use FurTrait;

    protected const string SPECIES = 'fox';
}
