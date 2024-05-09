<?php

declare(strict_types=1);

namespace Lib;

use Lib\Dispatcher\AuthGuard\AuthGuardDispatcher;
use Lib\Dispatcher\Container\ContainerDispatcher;
use Lib\Dispatcher\Route\RouteDispatcher;
use Lib\Http\Request;

final class Kernel
{
    public static function handleRequest(Request $request): void
    {
        $container = ContainerDispatcher::dispatch();

        AuthGuardDispatcher::dispatch($container, $request);

        RouteDispatcher::dispatch($request, $container);
    }
}
