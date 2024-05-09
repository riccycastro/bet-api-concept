<?php

namespace Lib\Dispatcher\AuthGuard;

use Lib\Dispatcher\AuthGuard\Exception\UserNotFoundException;

interface UserProviderInterface
{
    /**
     * @throws UserNotFoundException
     */
    public function findByToken(string $token): UserInterface;
}
