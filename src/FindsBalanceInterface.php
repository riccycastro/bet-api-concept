<?php

namespace App;

use App\Exception\BalanceNotFoundException;
use App\Model\Balance;
use App\ValueObject\UserId;

interface FindsBalanceInterface
{
    /**
     * @throws BalanceNotFoundException
     */
    public function findBalanceByUser(UserId $userId): Balance;
}
