<?php

namespace App\Domain\Model\Food;

trait OmnivorousAnimalTrait
{
    public function feed(Meal $meal): void
    {
        ++$this->feedsCount;
    }
}
