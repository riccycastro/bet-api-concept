<?php

namespace Lib\Dispatcher\Command;

interface DispatcherInterface
{
    public function dispatch(CommandInterface $command): mixed;
}
