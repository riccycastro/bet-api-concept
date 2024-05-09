<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\BalanceNotFoundException;
use App\FindsBalanceInterface;
use App\Model\Balance;
use App\StoresBalanceInterface;
use App\ValueObject\BalanceAmount;
use App\ValueObject\BalanceId;
use App\ValueObject\UserId;
use Lib\Database\Database;

final class BalanceRepository implements FindsBalanceInterface, StoresBalanceInterface
{
    public function __construct(
        private readonly Database $database
    ) {
    }

    public function findBalanceByUser(UserId $userId): Balance
    {
        $statement = $this->database->connection()->prepare('SELECT id, user_id, balance FROM balances WHERE user_id = :userId');
        $statement->execute(['userId' => $userId->value()]);

        $balance = $statement->fetch();

        if ($balance === false) {
            throw BalanceNotFoundException::fromUserId($userId);
        }

        return new Balance(
            BalanceId::fromInt((int) $balance['id']),
            UserId::fromInt((int) $balance['user_id']),
            BalanceAmount::fromFloat((float) $balance['balance'])
        );
    }

    public function updateBalance(Balance $balance): void
    {
        $statement = $this->database->connection()->prepare('UPDATE balances SET balance = :balance WHERE id = :id');
        $statement->execute([
            'id' => $balance->getId()->value(),
            'balance' => $balance->getBalance()->getValue(),
        ]);
    }
}
