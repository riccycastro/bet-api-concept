<?php

declare(strict_types=1);

namespace App\Exception;

use App\ValueObject\UserId;
use Lib\Exception\HttpException;

final class BalanceNotFoundException extends HttpException
{
    public function __construct(string $message)
    {
        parent::__construct(404, $message);
    }

    public static function fromUserId(UserId $userId): self
    {
        return new self(sprintf('Balance for user with id %s not found', $userId->value()));
    }
}
