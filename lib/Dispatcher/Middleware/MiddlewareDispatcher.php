<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Middleware;

use Lib\Container\ContainerInterface;

final class MiddlewareDispatcher
{
    public static function dispatch(ContainerInterface $container): void
    {
        $middlewares = include __BASE_DIR__ . '/start/middlewares.php';

        foreach ($middlewares as $middleware) {
            $instance = $container->get($middleware);

            $instance->handle();
        }
    }
}
