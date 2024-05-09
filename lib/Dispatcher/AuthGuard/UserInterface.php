<?php

namespace Lib\Dispatcher\AuthGuard;

interface UserInterface
{
    public function getId(): int;
    public function getUsername(): string;
}
