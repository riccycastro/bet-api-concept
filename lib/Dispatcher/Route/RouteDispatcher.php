<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Route;

use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Route\Exception\RouteNotFoundException;
use Lib\Http\Request;
use Lib\Http\Response;

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

        if (!$response instanceof Response) {
            throw new \LogicException(
                sprintf('%s must return an instance of %s', $controller, Response::class)
            );
        }

        http_response_code($response->statusCode);
        echo json_encode($response->body);
    }
}
