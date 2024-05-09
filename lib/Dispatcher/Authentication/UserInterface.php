<?php

namespace Lib\Dispatcher\Authentication;

interface UserInterface
{
    public function getId(): int;
    public function getUsername(): string;
}
