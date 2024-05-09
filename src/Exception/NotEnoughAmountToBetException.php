<?php

declare(strict_types=1);

namespace App\Exception;

use App\ValueObject\BalanceAmount;
use App\ValueObject\BetAmount;
use Lib\Exception\HttpException;

final class NotEnoughAmountToBetException extends HttpException
{
    public static function fromBetting(BalanceAmount $balanceAmount, BetAmount $betAmount): self
    {
        return new self(
            406,
            sprintf(
                'Not enough amount to bet. Balance: %s, Bet: %s',
                $balanceAmount->getValue(),
                $betAmount->getValue()
            )
        );
    }
}
