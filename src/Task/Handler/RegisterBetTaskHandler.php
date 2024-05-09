<?php

declare(strict_types=1);

namespace App\Task\Handler;

use App\Model\NewBet;
use App\StoresBetInterface;
use App\Task\RegisterBetTask;
use App\ValueObject\UserId;
use Lib\Security\SecurityContext;

final class RegisterBetTaskHandler
{
    public function __construct(
        private readonly SecurityContext $securityContext,
        private readonly StoresBetInterface $storesBet,
    ) {
    }

    public function __invoke(RegisterBetTask $task): NewBet
    {
        $useId = UserId::fromInt($this->securityContext->currentUser->getId());

        $newBet = new NewBet(
            userId: $useId,
            betAmount: $task->betAmount,
            betNumber: $task->betNumber,
            generatedNumber: $task->generatedNumber,
            payout: $task->payout,
        );

        $this->storesBet->storeBet(
            $newBet
        );

        return $newBet;
    }
}
