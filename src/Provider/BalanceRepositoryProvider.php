<?php

declare(strict_types=1);

namespace App\Provider;

use App\Repository\BalanceRepository;
use Lib\Container\ContainerInterface;
use Lib\Database\Database;
use Lib\Dispatcher\Container\Provider\ProviderInterface;

final class BalanceRepositoryProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(BalanceRepository::class, function () use ($container): BalanceRepository {
            /** @var Database $database */
            $database = $container->get(Database::class);

            return new BalanceRepository($database);
        });
    }
}
