<?php

declare(strict_types=1);

namespace Lib\Exception\Handler;

use Lib\Exception\HttpExceptionInterface;

final class ExceptionHandler
{
    public static function handle(\Throwable $exception): void
    {
        error_log($exception->getMessage());

        // assuming that we accept only json requests
        header('Content-Type: application/json');

        if ($exception instanceof HttpExceptionInterface) {
            http_response_code($exception->getStatusCode());
            echo json_encode([
                'message' => $exception->getMessage(),
                'code' => $exception->getStatusCode(),
            ]);

            return;
        }

        http_response_code(500);
        echo json_encode([
            'message' => 'Unexpected error',
            'code' => 500,
        ]);
    }
}
