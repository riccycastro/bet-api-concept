<?php

declare(strict_types=1);

namespace App\ValueObject;

final class BetNumber
{
    private int $value;

    private function __construct(?int $betNumber)
    {
        if (null === $betNumber) {
            throw new \InvalidArgumentException('Bet number cannot be null or empty');
        }

        if ($betNumber > 13 || $betNumber < 0) {
            throw new \InvalidArgumentException('Bet number must be between 0 and 13');
        }

        $this->value = $betNumber;
    }

    public static function fromInt(?int $betNumber): self
    {
        return new self($betNumber);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
