<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Container\Provider;

use App\Controller\PlaceBetController;
use Lib\Container\ContainerInterface;

final class PlaceBetControllerProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(PlaceBetController::class, new PlaceBetController());
    }
}
