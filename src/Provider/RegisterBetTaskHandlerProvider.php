<?php

declare(strict_types=1);

namespace App\Provider;

use App\StoresBetInterface;
use App\Task\Handler\RegisterBetTaskHandler;
use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Container\Provider\ProviderInterface;
use Lib\Security\SecurityContext;

final class RegisterBetTaskHandlerProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(RegisterBetTaskHandler::class, function () use ($container) {
            /** @var SecurityContext $securityContext */
            $securityContext = $container->get(SecurityContext::class);
            /** @var StoresBetInterface $storesBet */
            $storesBet = $container->get(StoresBetInterface::class);

            return new RegisterBetTaskHandler(
                $securityContext,
                $storesBet
            );
        });
    }
}