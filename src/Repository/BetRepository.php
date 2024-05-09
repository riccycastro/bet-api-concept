<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\NewBet;
use App\StoresBetInterface;
use Lib\Database\Database;

final class BetRepository implements StoresBetInterface
{
    public function __construct(
        private readonly Database $database
    ) {
    }

    public function storeBet(NewBet $bet): void
    {
        $statement = $this->database->connection()->prepare(
            'INSERT INTO bets (user_id, bet_amount, bet_number, generated_number, payout) VALUES (:userId, :betAmount, :betNumber, :generatedNumber, :payout)'
        );

        $statement->execute([
            'userId' => $bet->getUserId()->value(),
            'betAmount' => $bet->getBetAmount()->getValue(),
            'betNumber' => $bet->getBetNumber()->getValue(),
            'generatedNumber' => $bet->getGeneratedNumber()->getValue(),
            'payout' => $bet->getPayout()->getValue(),
        ]);
    }
}
