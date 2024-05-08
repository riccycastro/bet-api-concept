<?php

declare(strict_types=1);

namespace Lib\Http;

final class Request
{
    public function __construct(
        private readonly HttpMethod $method,
        private readonly string $uri,
        private readonly array $headers = [],
        private readonly string $body = '',
        private readonly array $query = []
    ) {
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public static function create(): self
    {
        $res = explode('?', $_SERVER['REQUEST_URI'] ?? '/', 2);

        $uri = $res[0];
        $query = $res[1] ?? '';

        $query = Request::resolveQueryString($query);

        return new self(
            HttpMethod::from($_SERVER['REQUEST_METHOD'] ?? HttpMethod::GET),
            $uri,
            Request::resolveHeaders(),
            Request::resolveBody(),
            $query
        );
    }

    private static function resolveQueryString(string $queryString): array
    {
        $query = [];
        parse_str($queryString, $query);

        return $query;
    }

    private static function resolveBody(): string {
        return file_get_contents('php://input');
    }

    private static function resolveHeaders(): array {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (str_starts_with($name, 'HTTP_')) {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_','', substr($name, 5)))))] = $value;
            }
        }

        return $headers;
    }
}
