<?php

declare(strict_types=1);

namespace App\Model;

use App\ValueObject\BalanceAmount;
use App\ValueObject\BalanceId;
use App\ValueObject\Payout;
use App\ValueObject\UserId;

final class Balance
{
    public function __construct(
        private readonly BalanceId $id,
        private readonly UserId $userId,
        private readonly BalanceAmount $balance,
    ) {
    }

    public function getId(): BalanceId
    {
        return $this->id;
    }

    public function getBalance(): BalanceAmount
    {
        return $this->balance;
    }

    public function addPayout(Payout $payout): self
    {
        return new self(
            $this->id,
            $this->userId,
            $this->balance->addPayout($payout),
        );
    }

    public function subtractBalanceAmount(BalanceAmount $amount): self
    {
        return new self(
            $this->id,
            $this->userId,
            $this->balance->subtract($amount),
        );
    }
}
