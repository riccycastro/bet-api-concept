<?php

declare(strict_types=1);

namespace App\Model;

use App\ValueObject\UserId;
use App\ValueObject\Username;
use Lib\Dispatcher\Authentication\UserInterface;

final class User implements UserInterface
{
    public function __construct(
        private readonly UserId $id,
        private readonly Username $username,
    ) {
    }

    public function getId(): int
    {
        return $this->id->value();
    }

    public function getUsername(): string
    {
        return (string) $this->username;
    }
}