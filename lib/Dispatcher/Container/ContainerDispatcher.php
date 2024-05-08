<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Container;

use Lib\Container\Container;
use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Container\Provider\ProviderInterface;

final class ContainerDispatcher
{
    public static function dispatch(): ContainerInterface
    {
        $providers = include __BASE_DIR__ . '/start/providers.php';

        $container = new Container();
        foreach ($providers as $provider) {

            $instance = new $provider();

            if ($instance instanceof ProviderInterface) {
                $instance->register($container);
            }
        }

        return $container;
    }
}
