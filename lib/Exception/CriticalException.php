<?php

declare(strict_types=1);

namespace Lib\Exception;

class CriticalException extends \RuntimeException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}
