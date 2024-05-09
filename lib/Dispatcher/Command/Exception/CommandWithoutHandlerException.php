<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Command\Exception;

use Lib\Exception\CriticalException;

final class CommandWithoutHandlerException extends CriticalException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }

    public static function fromCommand(string $command): self
    {
        return new self(sprintf('Command without handler: %s', $command));
    }
}
