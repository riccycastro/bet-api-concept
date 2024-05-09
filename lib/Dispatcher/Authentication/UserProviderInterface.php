<?php

namespace Lib\Dispatcher\Authentication;

use Lib\Dispatcher\Authentication\Exception\UserNotFoundException;

interface UserProviderInterface
{
    /**
     * @throws UserNotFoundException
     */
    public function findByToken(string $token): UserInterface;
}
