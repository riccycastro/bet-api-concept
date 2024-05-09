<?php

declare(strict_types=1);

namespace App\Provider;

use App\Repository\UserRepository;
use Lib\Container\ContainerInterface;
use Lib\Database\Database;
use Lib\Dispatcher\Authentication\UserProviderInterface;
use Lib\Dispatcher\Container\Provider\ProviderInterface;

final class UserProviderProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(UserProviderInterface::class, function () use ($container) {
            /** @var Database $database */
            $database = $container->get(Database::class);

            return new UserRepository($database);
        });
    }
}