<?php

namespace Lib\Dispatcher\Container\Provider;

use Lib\Container\ContainerInterface;

interface ProviderInterface
{
    public function register(ContainerInterface $container): void;
}
