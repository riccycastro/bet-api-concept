<?php

declare(strict_types=1);

namespace App\Command\Handler;

use App\Command\PlaceBetCommand;
use App\Exception\BalanceNotFoundException;
use App\Exception\NotEnoughAmountToBetException;
use App\FindsBalanceInterface;
use App\StoresBalanceInterface;
use App\ValueObject\BalanceAmount;
use App\ValueObject\BetAmount;
use App\ValueObject\BetNumber;
use App\ValueObject\ReturnToPlayer;
use App\ValueObject\UserId;
use Lib\Dispatcher\Command\DispatcherInterface;
use Lib\Security\SecurityContext;

final class PlaceBetCommandHandler
{
    public function __construct(
        private readonly DispatcherInterface $commandDispatcher,
        private readonly FindsBalanceInterface $balances,
        private readonly StoresBalanceInterface $balanceStore,
        private readonly SecurityContext $context,
        private readonly ReturnToPlayer $returnToPlayer,
        private readonly int $diceMaxNumber,
    ) {
    }

    /**
     * @throws BalanceNotFoundException
     */
    public function __invoke(PlaceBetCommand $command): void
    {
        $userId = UserId::fromInt($this->context->currentUser->getId());

        $balance = $this->balances->findBalanceByUser(
            $userId
        );

        if (!$balance->getBalance()->isGreaterThan(BalanceAmount::fromBetAmount($command->amount))) {
            throw NotEnoughAmountToBetException::fromBetting($balance->getBalance(), $command->amount);
        }

        if ($this->rollDice($command->number)) {
            $amount = $this->calculateWinnings($command->amount);
            $toStoreBalance = $balance->addBalanceAmount($amount);
        } else {
            $toStoreBalance = $balance->subtractBalanceAmount(
                BalanceAmount::fromBetAmount($command->amount)
            );
        }

        $this->balanceStore->updateBalance($toStoreBalance);
    }

    private function rollDice(BetNumber $number): bool
    {
        $randomNumber = rand(0, $this->diceMaxNumber);

        return $randomNumber === $number->getValue();
    }

    /**
     * Applied formula: BetAmount + ((BetAmount * ReturnToPlayer) / DiceMaxNumber)
     */
    private function calculateWinnings(BetAmount $amount): BalanceAmount
    {
        $amount = BalanceAmount::fromBetAmount($amount);

        $amountPercentage = $amount->multiplyReturnToPlayer($this->returnToPlayer);

        $payoutPerWin = $amountPercentage->divideByNumeric($this->diceMaxNumber);

        return $amount->add($payoutPerWin);
    }
}
