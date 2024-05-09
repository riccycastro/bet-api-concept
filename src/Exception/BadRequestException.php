<?php

declare(strict_types=1);

namespace App\Exception;

use Lib\Exception\HttpException;

final class BadRequestException extends HttpException
{
    public function __construct(string $message = "")
    {
        parent::__construct(400, $message);
    }

    public static function fromInvalidArgumentException(\InvalidArgumentException $exception): self
    {
        return new self($exception->getMessage());
    }
}
