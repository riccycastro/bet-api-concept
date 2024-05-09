<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Command;

use Lib\Container\ContainerInterface;
use Lib\Dispatcher\Command\Exception\CommandWithoutHandlerException;

final class CommandDispatcher implements DispatcherInterface
{
    private array $commands = [];

    public function __construct(
        private readonly ContainerInterface $container
    ) {
        $this->commands = include __BASE_DIR__ . '/start/commands.php';
    }

    public function dispatch(CommandInterface $command): mixed
    {
        if (!in_array(get_class($command), array_keys($this->commands))) {
            throw CommandWithoutHandlerException::fromCommand(get_class($command));
        }

        $handler = $this->container->get($this->commands[get_class($command)]);

        return ($handler)($command);
    }
}
