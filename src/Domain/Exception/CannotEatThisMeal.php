<?php

namespace App\Domain\Exception;

use App\Domain\Model\Animal\Animal;
use App\Domain\Model\Food\Meal;

class CannotEatThisMeal extends \Exception
{
    private function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(Animal $animal, Meal $meal): self
    {
        return new self(
            sprintf(
                'Animal %s cannot eat meal %s',
                $animal,
                $meal->type()
            )
        );
    }
}
