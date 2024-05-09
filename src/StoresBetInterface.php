<?php

namespace App;

use App\Model\NewBet;

interface StoresBetInterface
{
    public function storeBet(NewBet $bet): void;
}
