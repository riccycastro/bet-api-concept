<?php

use Lib\Dispatcher\Container\Provider\DatabaseProvider;
use Lib\Dispatcher\Container\Provider\PlaceBetControllerProvider;
use Lib\Dispatcher\Container\Provider\UserProviderProvider;
use Lib\Dispatcher\Container\Provider\UserRepositoryProvider;

return [
    DatabaseProvider::class,
    PlaceBetControllerProvider::class,
    UserProviderProvider::class,
    UserRepositoryProvider::class
];
