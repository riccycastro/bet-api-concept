<?php

declare(strict_types=1);

namespace Lib\Dispatcher\Route\Exception;

use Lib\Exception\HttpException;
use Lib\Exception\HttpExceptionInterface;

final class RouteNotFoundException extends HttpException implements HttpExceptionInterface
{
    public function __construct(string $message)
    {
        parent::__construct(404, $message);
    }

    public static function fromUri(string $uri): self
    {
        return new self(sprintf('Route not found for uri: %s', $uri));
    }
}
