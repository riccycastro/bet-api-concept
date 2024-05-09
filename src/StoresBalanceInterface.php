<?php

namespace App;

use App\Model\Balance;

interface StoresBalanceInterface
{
    public function updateBalance(Balance $balance): void;
}
