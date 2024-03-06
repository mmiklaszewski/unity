<?php

namespace App\Domain\Model\Animal;

use App\Domain\Model\Food\Meal;

interface Animal
{
    public function feed(Meal $meal): void;

    public function __toString(): string;
}
