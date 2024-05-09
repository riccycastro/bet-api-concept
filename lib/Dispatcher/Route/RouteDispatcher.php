<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Route;

use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Route\Exception\RouteNotFoundException;
use Lib\Http\Request;

final class RouteDispatcher
{
    public static function dispatch(Request $request, ContainerInterface $container): void
    {
        $routes = include __BASE_DIR__ . '/start/routes.php';

        if (!array_key_exists($request->getUri(), $routes)) {
            throw RouteNotFoundException::fromUri($request->getUri());
        }

        [$controller, $method] = $routes[$request->getUri()];

        if (!$request->isMethod($method)) {
            throw RouteNotFoundException::fromUri($request->getUri());
        }

        $controller = $container->get($controller);

        $response = ($controller)($request);
    }
}
