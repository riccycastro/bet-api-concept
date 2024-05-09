<?php

use App\Command\Handler\PlaceBetCommandHandler;
use App\Command\PlaceBetCommand;
use App\Task\Handler\RegisterBetTaskHandler;
use App\Task\RegisterBetTask;

return [
    PlaceBetCommand::class => PlaceBetCommandHandler::class,
    RegisterBetTask::class => RegisterBetTaskHandler::class,
];
