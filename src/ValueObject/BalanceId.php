<?php

declare(strict_types=1);

namespace App\ValueObject;

final class BalanceId
{
    private int $value;

    private function __construct(int $id)
    {
        if ($id < 0) {
            throw new \InvalidArgumentException('Balance id must be greater than 0');
        }

        $this->value = $id;
    }

    public static function fromInt(int $id): self
    {
        return new self($id);
    }

    public function value(): int
    {
        return $this->value;
    }
}
