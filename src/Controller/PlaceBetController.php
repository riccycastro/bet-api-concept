<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\PlaceBetCommand;
use App\Dto\PlaceBetOutputDto;
use App\Exception\BadRequestException;
use Lib\Controller\AbstractController;
use Lib\Dispatcher\Command\DispatcherInterface;
use Lib\Http\Request;
use Lib\Http\Response;

final class PlaceBetController extends AbstractController
{
    public function __construct(
        private readonly DispatcherInterface $commandDispatcher,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        try {
            $placeBetCommand = PlaceBetCommand::fromArray($request->getBody());
        } catch (\InvalidArgumentException $e) {
            throw BadRequestException::fromInvalidArgumentException($e);
        } catch (\Throwable $e) {
            throw new BadRequestException('Bad request');
        }

        $newBet = $this->commandDispatcher->dispatch($placeBetCommand);

        return new Response(PlaceBetOutputDto::fromNewBet($newBet));
    }
}
