<?php

declare(strict_types=1);

namespace App\Command;

use App\ValueObject\BetAmount;
use App\ValueObject\BetNumber;
use Lib\Dispatcher\Command\CommandInterface;

final class PlaceBetCommand implements CommandInterface
{
    public function __construct(
        public readonly BetNumber $number,
        public readonly BetAmount $amount,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            BetNumber::fromInt($data['number'] ?? null),
            BetAmount::fromFloat((float) ($data['amount'] ?? null)),
        );
    }
}
