<?php

declare(strict_types=1);

namespace App\ValueObject;

final class BetAmount
{
    private int $value;

    private function __construct(?float $amount)
    {
        if (null === $amount) {
            throw new \InvalidArgumentException('Bet amount cannot be null or empty');
        }

        if ($amount <= 0) {
            throw new \InvalidArgumentException('Bet amount must be greater than 0 and not null');
        }

        $numberString = (string) $amount;

        if (str_contains($numberString, '.')) {
            $parts = explode('.', $numberString);

            if (strlen($parts[1]) > 2) {
                throw new \InvalidArgumentException('Bet amount cannot have more than 2 decimal places');
            }
        }

        $this->value = (int) ($amount * 100);
    }

    public static function fromFloat(?float $amount): self
    {
        return new self($amount);
    }

    public function getValue(): float
    {
        return $this->value / 100;
    }
}
