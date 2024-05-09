<?php

declare(strict_types=1);

namespace Lib\Security;

use App\Model\User;

final class SecurityContext
{
    public function __construct(
        public readonly User $currentUser
    ) {
    }
}
