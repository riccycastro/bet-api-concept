<?php

declare(strict_types=1);

namespace Lib\Http\Exception;

use Lib\Exception\HttpException;

final class UnsupportedMediaTypeException extends HttpException
{
    public function __construct(string $message)
    {
        parent::__construct(415, $message);
    }

    public static function fromContentType(string $contentType): self
    {
        return new self(sprintf('Unsupported media type: %s. Expecting application/json', $contentType));
    }
}
