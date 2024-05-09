<?php

declare(strict_types=1);

namespace App\ValueObject;

final class BalanceAmount
{
    private int $value;

    private function __construct(?float $amount)
    {
        if (null === $amount) {
            throw new \InvalidArgumentException('Balance amount cannot be null or empty');
        }

        if ($amount < 0) {
            throw new \InvalidArgumentException('Balance amount cannot be negative');
        }

        $numberString = (string) $amount;

        if (str_contains($numberString, '.')) {
            $parts = explode('.', $numberString);

            if (strlen($parts[1]) > 2) {
                throw new \InvalidArgumentException('Balance amount cannot have more than 2 decimal places');
            }
        }
        $this->value = (int) ($amount * 100);
    }

    public static function fromFloat(?float $amount): self
    {
        return new self($amount);
    }

    public static function fromBetAmount(BetAmount $amount): self
    {
        return self::fromFloat($amount->getValue());
    }

    public static function fromInt(int $amount): self
    {
        return new self($amount / 100);
    }

    public function getValue(): float
    {
        return $this->value / 100;
    }

    public function subtract(BalanceAmount $amount): BalanceAmount
    {
        return self::fromInt($this->value - $amount->value);
    }

    public function isGreaterThan(BalanceAmount $amount): bool
    {
        return $this->value > $amount->value;
    }

    public function multiplyReturnToPlayer(ReturnToPlayer $returnToPlayer): self
    {
        return BalanceAmount::fromInt((int) ($this->value * $returnToPlayer->getPercentage()));
    }

    public function divideByNumeric(int $number): self
    {
        return BalanceAmount::fromInt((int) ($this->value / $number));
    }

    public function add(BalanceAmount $payoutPerWin): self
    {
        return BalanceAmount::fromInt($this->value + $payoutPerWin->value);
    }

    public function addPayout(Payout $payout): self {
        return BalanceAmount::fromInt($this->value + $payout->getUnformattedValue());
    }
}
