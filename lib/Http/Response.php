<?php

declare(strict_types=1);

namespace Lib\Http;

final class Response
{
    public function __construct(
        public readonly mixed $body,
        public readonly int $statusCode = 200
    ) {
    }
}
