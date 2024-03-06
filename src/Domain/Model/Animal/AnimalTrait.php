<?php

namespace App\Domain\Model\Animal;

trait AnimalTrait
{
    protected int $feedsCount = 0;

    public function __construct(public readonly string $name)
    {
    }

    public function __toString(): string
    {
        return sprintf(
            '%s %s',
            mb_convert_case(self::SPECIES, MB_CASE_TITLE, 'UTF-8'),
            mb_convert_case($this->name, MB_CASE_TITLE, 'UTF-8'),
        );
    }

    public function feedsCount(): int
    {
        return $this->feedsCount;
    }
}
