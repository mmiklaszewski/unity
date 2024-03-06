<?php

namespace App\Domain\Model\Fur;

trait FurTrait
{
    private bool $combed = false;

    #[\Override]
    public function comb(): void
    {
        $this->combed = true;
    }

    public function isCombed(): bool
    {
        return $this->combed;
    }
}
