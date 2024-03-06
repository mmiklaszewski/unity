<?php

namespace App\Domain\Model\Food;

final class Meat implements Meal
{
    private const string TYPE = 'MEAT';

    public function type(): string
    {
        return self::TYPE;
    }
}
