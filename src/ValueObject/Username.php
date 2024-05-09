<?php

declare(strict_types=1);

namespace App\ValueObject;

final class Username implements \Stringable
{
    private string $value;

    private function __construct(string $username)
    {
        if (empty($username)) {
            throw new \InvalidArgumentException('Username cannot be empty');
        }

        if ($this->containsSpecialChars($username)) {
            throw new \InvalidArgumentException('Username cannot contain special characters, except underscores');
        }

        $this->value = $username;
    }

    public static function fromString(string $username): self
    {
        return new self($username);
    }

    private function containsSpecialChars($str)
    {
        // Regular expression to match any character that is not a letter, digit, or underscore
        return preg_match('/[^A-Za-z0-9_]/', $str);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
