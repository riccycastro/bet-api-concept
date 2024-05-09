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
            $binding = $this->bindings[$id];

            if ($binding instanceof \Closure) {
                return $binding();
            }

            return $binding;
        }

        throw ClassNotBoundException::fromClassName($id);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->bindings);
    }

    // All bounds are singletons
    public function bind(string $id, object $instance): self
    {
        $this->bindings[$id] = $instance;

        return $this;
    }
}