<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Container\Provider;

use App\Repository\UserRepository;
use Lib\Container\ContainerInterface;
use Lib\Database\Database;
use Lib\Dispatcher\AuthGuard\UserProviderInterface;

final class UserProviderProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        /** @var Database $database */
        $database = $container->get(Database::class);

        $container->bind(UserProviderInterface::class, new UserRepository($database));
    }
}