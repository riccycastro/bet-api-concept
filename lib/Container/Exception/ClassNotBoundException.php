<?php

declare(strict_types=1);

namespace Lib\Container\Exception;

use Lib\Exception\CriticalException;
use Lib\Exception\HttpException;

final class ClassNotBoundException extends CriticalException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }

    public static function fromClassName(string $class): self
    {
        return new self(sprintf('Class not bound: %s', $class));
    }
}
