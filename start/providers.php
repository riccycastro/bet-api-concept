<?php

use App\Provider\BalanceRepositoryProvider;
use App\Provider\FindsBalanceProvider;
use App\Provider\PlaceBetCommandHandlerProvider;
use App\Provider\PlaceBetControllerProvider;
use App\Provider\StoresBalanceProvider;
use App\Provider\UserProviderProvider;
use Lib\Dispatcher\Container\Provider\CommandDispatcherProvider;
use Lib\Dispatcher\Container\Provider\DatabaseProvider;

return [
    CommandDispatcherProvider::class,
    DatabaseProvider::class,
    BalanceRepositoryProvider::class,
    PlaceBetControllerProvider::class,
    UserProviderProvider::class,
    FindsBalanceProvider::class,
    StoresBalanceProvider::class,
    PlaceBetCommandHandlerProvider::class,
];
