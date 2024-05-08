<?php

namespace Lib\Exception;

interface HttpExceptionInterface extends \Throwable
{
    public function getStatusCode(): int;
}
