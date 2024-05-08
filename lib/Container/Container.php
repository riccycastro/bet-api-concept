<?php

declare(strict_types=1);

namespace Lib\Container;

use Lib\Container\Exception\ClassNotBoundException;

final class Container implements ContainerInterface
{
    private array $bindings = [];

    public function get(string $id): object
    {

        if ($this->has($id)) {
            return $this->bindings[$id];
        }

        throw new ClassNotBoundException($id);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->bindings);
    }

    // All bounds are singletons
    public function bind(string $id, object $instance): self
    {
        $this->bindings[$id] =  $instance;

        return $this;
    }
}