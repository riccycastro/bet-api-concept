<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Container\Provider;

use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Command\CommandDispatcher;
use Lib\Dispatcher\Command\DispatcherInterface;

final class CommandDispatcherProvider implements ProviderInterface
{

    public function register(ContainerInterface $container): void
    {
        $container->bind(DispatcherInterface::class, function () use ($container) {
            return new CommandDispatcher($container);
        });
    }
}
