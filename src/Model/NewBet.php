<?php

declare(strict_types=1);

namespace App\Model;

use App\ValueObject\BetAmount;
use App\ValueObject\BetNumber;
use App\ValueObject\Payout;
use App\ValueObject\UserId;

final class NewBet
{
    public function __construct(
        private readonly UserId $userId,
        private readonly BetAmount $betAmount,
        private readonly BetNumber $betNumber,
        private readonly BetNumber $generatedNumber,
        private readonly Payout $payout,
    ) {
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getBetAmount(): BetAmount
    {
        return $this->betAmount;
    }

    public function getBetNumber(): BetNumber
    {
        return $this->betNumber;
    }

    public function getGeneratedNumber(): BetNumber
    {
        return $this->generatedNumber;
    }

    public function getPayout(): Payout
    {
        return $this->payout;
    }

    public function isWin(): bool
    {
        return $this->betNumber->isEqualTo($this->generatedNumber);
    }
}
