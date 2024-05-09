<?php

declare(strict_types=1);

namespace Lib\Http\Exception;

use Lib\Exception\HttpException;

final class BadRequestException extends HttpException
{
    public function __construct(string $message = "")
    {
        parent::__construct(400, $message);
    }
}
