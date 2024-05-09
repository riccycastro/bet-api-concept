<?php

declare(strict_types=1);

namespace App\Dto;

use App\ValueObject\BetNumber;

final class RollDiceResult
{
    public function __construct(
        public readonly BetNumber $generatedNumber,
        public readonly bool $isWin,
    ) {
    }
}