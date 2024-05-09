<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\User;
use App\ValueObject\UserId;
use App\ValueObject\Username;
use Lib\Database\Database;
use Lib\Dispatcher\Authentication\Exception\UserNotFoundException;
use Lib\Dispatcher\Authentication\UserInterface;
use Lib\Dispatcher\Authentication\UserProviderInterface;

final class UserRepository implements UserProviderInterface
{
    public function __construct(
        private readonly Database $database
    ) {
    }

    public function findByToken(string $token): UserInterface
    {
        $statement = $this->database->connection()->prepare('SELECT * FROM users WHERE token = :token');
        $statement->execute(['token' => $token]);

        $user = $statement->fetch();

        if ($user === false) {
            throw new UserNotFoundException();
        }

        return new User(
            UserId::fromInt((int) $user['id']),
            Username::fromString((string) $user['username']),
        );
    }
}