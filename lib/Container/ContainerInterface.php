<?php

namespace Lib\Container;

use Lib\Container\Exception\ClassNotBoundException;

interface ContainerInterface
{
    /**
     * @throws ClassNotBoundException
     */
    public function get(string $id): object;
    public function has(string $id): bool;
    public function bind(string $id, object $instance): self;
}
