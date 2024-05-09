<?php

declare(strict_types=1);

namespace Lib\Dispatcher\AuthGuard;

use Lib\Container\ContainerInterface;
use Lib\Dispatcher\AuthGuard\Exception\UnauthorizedException;
use Lib\Dispatcher\AuthGuard\Exception\UserNotFoundException;
use Lib\Http\Request;
use Lib\Security\SecurityContext;

final class AuthGuardDispatcher
{
    public static function dispatch(ContainerInterface $container, Request $request): void
    {
        $token = $request->getAuthToken();

        if (null === $token) {
            throw new UnauthorizedException();
        }

        /** @var UserProviderInterface $userProvider */
        $userProvider = $container->get(UserProviderInterface::class);

        try {
            $user = $userProvider->findByToken($token);
            $container->bind(SecurityContext::class, new SecurityContext($user));

        } catch (UserNotFoundException) {
            throw new UnauthorizedException();
        }
    }
}
