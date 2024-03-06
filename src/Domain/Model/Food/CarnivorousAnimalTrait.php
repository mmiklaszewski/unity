<?php

namespace App\Domain\Model\Food;

use App\Domain\Exception\CannotEatThisMeal;

trait CarnivorousAnimalTrait
{
    public function feed(Meal $meal): void
    {
        if (!$meal instanceof Meat) {
            throw CannotEatThisMeal::create($this, $meal);
        }

        ++$this->feedsCount;
    }
}
