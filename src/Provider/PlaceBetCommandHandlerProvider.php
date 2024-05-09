<?php

declare(strict_types=1);

namespace App\Provider;

use App\Command\Handler\PlaceBetCommandHandler;
use App\FindsBalanceInterface;
use App\StoresBalanceInterface;
use App\ValueObject\ReturnToPlayer;
use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Command\DispatcherInterface;
use Lib\Dispatcher\Container\Provider\ProviderInterface;
use Lib\Security\SecurityContext;

final class PlaceBetCommandHandlerProvider implements ProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(PlaceBetCommandHandler::class, function () use ($container) {
            /** @var DispatcherInterface $commandDispatcher */
            $commandDispatcher = $container->get(DispatcherInterface::class);
            /** @var FindsBalanceInterface $balances */
            $balances = $container->get(FindsBalanceInterface::class);
            /** @var StoresBalanceInterface $balanceStore */
            $balanceStore = $container->get(StoresBalanceInterface::class);
            /** @var SecurityContext $securityContext */
            $securityContext = $container->get(SecurityContext::class);

            // set a default value of 95
            $returnToPlayer = ReturnToPlayer::fromInt((int) $_ENV['RETURN_TO_PLAYER'] ?? 95);
            $diceMaxNumber = (int) $_ENV['DICE_MAX_NUMBER'] ?? 6;

            return new PlaceBetCommandHandler(
                $commandDispatcher,
                $balances,
                $balanceStore,
                $securityContext,
                $returnToPlayer,
                $diceMaxNumber,
            );
        });
    }
}
