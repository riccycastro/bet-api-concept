<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Authentication\Exception;

use Lib\Exception\HttpException;

final class UnauthorizedException extends HttpException
{
    public function __construct()
    {
        parent::__construct(401, 'Unauthorized');
    }
}
