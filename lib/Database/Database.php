<?php

declare(strict_types=1);

namespace Lib\Database;

use Lib\Database\Exception\UnableToConnectException;

final class Database
{
    private readonly \PDO $connection;

    public function __construct(
        private readonly string $host,
        private readonly string $user,
        private readonly string $password,
        private readonly string $database,
        private readonly int $port = 3306,
    ) {
        try {
            $this->connection = new \PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->database}",
                $this->user,
                $this->password
            );
        } catch (\PDOException $e) {
            throw new UnableToConnectException($e->getMessage());
        }
    }

    public function connection(): \PDO
    {
        return $this->connection;
    }
}
