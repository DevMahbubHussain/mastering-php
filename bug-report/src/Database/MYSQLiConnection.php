<?php

declare(strict_types=1);

namespace App\Database;

use App\Contarcts\DatabaseConnectionInterface;
use App\Exceptions\BDConnectionException;
use mysqli;
use Throwable;

class MYSQLiConnection extends AbstractConnection implements DatabaseConnectionInterface
{
    const REQUIRED_CONNECTION_KEYS = [
        'host',
        'db_name',
        'db_username',
        'db_user_password',
        'default_fetch',
    ];

    protected function parseCredentials(array $credentials): array
    {
        return [
            $credentials['host'],
            $credentials['db_username'],
            $credentials['db_user_password'],
            $credentials['db_name'],
        ];
    }

    public function connect(): MYSQLiConnection
    {
        $credentials = $this->parseCredentials($this->credentials);
        try {
            $this->connection = new mysqli(...$credentials);
        } catch (Throwable $exception) {
            throw new BDConnectionException(
                $exception->getMessage(),
                $this->credentials,
                500
            );
        }

        return $this;
    }
    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}
