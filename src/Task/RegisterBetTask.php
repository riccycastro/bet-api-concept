<?php

declare(strict_types=1);

namespace App\Task;

use App\ValueObject\BetAmount;
use App\ValueObject\BetNumber;
use App\ValueObject\Payout;
use Lib\Dispatcher\Command\CommandInterface;

final class RegisterBetTask implements CommandInterface
{
    public function __construct(
        public readonly BetAmount $betAmount,
        public readonly BetNumber $betNumber,
        public readonly BetNumber $generatedNumber,
        public readonly Payout $payout,
    ) {
    }
}
