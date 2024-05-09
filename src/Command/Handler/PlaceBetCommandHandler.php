<?php

declare(strict_types=1);

namespace App\Command\Handler;

use App\Command\PlaceBetCommand;
use App\Dto\RollDiceResult;
use App\Exception\BalanceNotFoundException;
use App\Exception\NotEnoughAmountToBetException;
use App\FindsBalanceInterface;
use App\Model\NewBet;
use App\StoresBalanceInterface;
use App\Task\RegisterBetTask;
use App\ValueObject\BalanceAmount;
use App\ValueObject\BetAmount;
use App\ValueObject\BetNumber;
use App\ValueObject\Payout;
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
    public function __invoke(PlaceBetCommand $command): NewBet
    {
        $userId = UserId::fromInt($this->context->currentUser->getId());

        $balance = $this->balances->findBalanceByUser(
            $userId
        );

        if (!$balance->getBalance()->isGreaterThan(BalanceAmount::fromBetAmount($command->amount))) {
            throw NotEnoughAmountToBetException::fromBetting($balance->getBalance(), $command->amount);
        }

        $rollDiceResult = $this->rollDice($command->number);

        $payout = Payout::zero();

        if ($rollDiceResult->isWin) {
            $payout = $this->calculatePayout($command->amount);
            $toStoreBalance = $balance->addPayout($payout);
        } else {
            $toStoreBalance = $balance->subtractBalanceAmount(
                BalanceAmount::fromBetAmount($command->amount)
            );
        }

        $this->balanceStore->updateBalance($toStoreBalance);

        return $this->commandDispatcher->dispatch(
            new RegisterBetTask(
                $command->amount,
                $command->number,
                $rollDiceResult->generatedNumber,
                $payout
            )
        );
    }

    private function rollDice(BetNumber $number): RollDiceResult
    {
        $randomNumber = BetNumber::fromInt(rand(0, $this->diceMaxNumber));

        return new RollDiceResult($randomNumber, $randomNumber->isEqualTo($number));
    }

    /**
     * Applied formula: BetAmount + ((BetAmount * ReturnToPlayer) / DiceMaxNumber)
     */
    private function calculatePayout(BetAmount $amount): Payout
    {
        $amount = BalanceAmount::fromBetAmount($amount);

        $amountPercentage = $amount->multiplyReturnToPlayer($this->returnToPlayer);

        $payoutPerWin = $amountPercentage->divideByNumeric($this->diceMaxNumber);

        return Payout::fromBalanceAmount($amount->add($payoutPerWin));
    }
}
