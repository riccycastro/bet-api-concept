<?php

declare(strict_types=1);

namespace App\Provider;

use App\Repository\BetRepository;
use App\StoresBetInterface;
use Lib\Container\ContainerInterface;
use Lib\Database\Database;
use Lib\Dispatcher\Container\Provider\ProviderInterface;

final class StoresBetProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(StoresBetInterface::class, function () use ($container) {
            /** @var Database $database */
            $database = $container->get(Database::class);

            return new BetRepository($database);
        });
    }
}
