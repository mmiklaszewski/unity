<?php

namespace App\Domain\Model\Animal;

use App\Domain\Model\Food\HerbivorousAnimalTrait;

final class Rhino implements Animal
{
    use AnimalTrait;
    use HerbivorousAnimalTrait;

    protected const string SPECIES = 'rhino';
}
