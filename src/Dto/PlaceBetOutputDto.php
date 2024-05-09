<?php

declare(strict_types=1);

namespace App\Dto;

use App\Model\NewBet;

final class PlaceBetOutputDto
{
    public function __construct(
        public readonly bool $isWin,
        public readonly float $payout,
    ) {
    }

    public static function fromNewBet(NewBet $newBet): self
    {
        return new self(
            $newBet->isWin(),
            $newBet->getPayout()->getValue(),
        );
    }
}