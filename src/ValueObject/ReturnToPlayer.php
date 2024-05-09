<?php

declare(strict_types=1);

namespace App\ValueObject;

final class ReturnToPlayer
{
    private int $value;

    private function __construct(int $percentage)
    {
        if ($percentage < 0 || $percentage > 100) {
            throw new \InvalidArgumentException('Return to player percentage must be between 0 and 100');
        }

        $this->value = $percentage;
    }

    public static function fromInt(int $percentage): self
    {
        return new self($percentage);
    }

    public function getPercentage(): float
    {
        return $this->value / 100;
    }
}
