<?php

declare(strict_types=1);

namespace App\ValueObject;

final class Payout
{
    private int $value;

    private function __construct(float $payout)
    {
        if ($payout < 0) {
            throw new \InvalidArgumentException('Payout cannot be negative');
        }

        $numberString = (string) $payout;

        if (str_contains($numberString, '.')) {
            $parts = explode('.', $numberString);

            if (strlen($parts[1]) > 2) {
                throw new \InvalidArgumentException('Payout cannot have more than 2 decimal places');
            }
        }

        $this->value = (int) ($payout * 100);
    }

    public static function fromBalanceAmount(BalanceAmount $balanceAmount): self
    {
        return new self($balanceAmount->getValue());
    }
    public static function zero(): self
    {
        return new self(0);
    }

    public function getValue(): float
    {
        return $this->value / 100;
    }


    public function getUnformattedValue(): int
    {
        return $this->value;
    }
}
