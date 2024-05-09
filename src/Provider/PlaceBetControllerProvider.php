<?php

declare(strict_types=1);

namespace App\Provider;

use App\Controller\PlaceBetController;
use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Command\DispatcherInterface;
use Lib\Dispatcher\Container\Provider\ProviderInterface;

final class PlaceBetControllerProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(PlaceBetController::class, function () use ($container) {
            /** @var DispatcherInterface $commandDispatcher */
            $commandDispatcher = $container->get(DispatcherInterface::class);

            return new PlaceBetController($commandDispatcher);
        });
    }
}
