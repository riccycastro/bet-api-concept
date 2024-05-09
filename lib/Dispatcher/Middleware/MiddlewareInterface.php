<?php

namespace Lib\Dispatcher\Middleware;

interface MiddlewareInterface
{
    public function handle(): void;
}
