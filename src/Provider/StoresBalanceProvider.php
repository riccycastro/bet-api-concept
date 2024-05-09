<?php

declare(strict_types=1);

namespace App\Provider;

use App\Repository\BalanceRepository;
use App\StoresBalanceInterface;
use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Container\Provider\ProviderInterface;

final class StoresBalanceProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(StoresBalanceInterface::class, function () use ($container) {
            /** @var BalanceRepository $balanceRepository */
            $balanceRepository = $container->get(BalanceRepository::class);

            return $balanceRepository;
        });
    }
}
