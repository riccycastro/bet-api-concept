<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Authentication\Exception;

use Lib\Exception\HttpException;

final class UserNotFoundException extends HttpException
{
    public function __construct(string $message = "")
    {
        parent::__construct(404, $message);
    }
}
