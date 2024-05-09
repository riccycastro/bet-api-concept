<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Container\Provider;

use Lib\Container\ContainerInterface;
use Lib\Database\Database;

final class DatabaseProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(Database::class, function () {
            return new Database(
                $_ENV['DB_HOST'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD'],
                $_ENV['DB_DATABASE'],
                (int) $_ENV['DB_PORT'] ?? 3306
            );
        });
    }
}
