<?php

declare(strict_types=1);

namespace Lib\Database\Exception;

use Lib\Exception\CriticalException;

final class UnableToConnectException extends CriticalException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
