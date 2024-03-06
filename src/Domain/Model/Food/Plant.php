<?php

namespace App\Domain\Model\Food;

final class Plant implements Meal
{
    private const string TYPE = 'PLANT';

    public function type(): string
    {
        return self::TYPE;
    }
}
