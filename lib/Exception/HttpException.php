<?php

declare(strict_types=1);

namespace Lib\Exception;

class HttpException extends \RuntimeException implements HttpExceptionInterface
{
    public function __construct(
        private int $statusCode,
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
