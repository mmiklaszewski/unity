<?php

namespace App\Domain\Model\Food;

use App\Domain\Exception\CannotEatThisMeal;

trait HerbivorousAnimalTrait
{
    public function feed(Meal $meal): void
    {
        if (!$meal instanceof Plant) {
            throw CannotEatThisMeal::create($this, $meal);
        }
        ++$this->feedsCount;
    }
}
