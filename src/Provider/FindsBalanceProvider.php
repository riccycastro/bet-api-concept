<?php

namespace App\Provider;

use App\FindsBalanceInterface;
use App\Repository\BalanceRepository;
use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Container\Provider\ProviderInterface;

final class FindsBalanceProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(FindsBalanceInterface::class, function () use ($container) {
            return $container->get(BalanceRepository::class);
        });
    }
}
