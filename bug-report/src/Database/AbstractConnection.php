<?php

declare(strict_types=1);

namespace App\Database;

use App\Exceptions\MissingArgumentException;

abstract class AbstractConnection
{
    protected $credentials;
    protected $connection;

    const REQUIRED_CONNECTION_KEYS = [];


    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
        if (!$this->credentialsHaveRequiredKeys($this->credentials)) {
            throw new MissingArgumentException(
                sprintf(
                    'Database connection credentials are not mapped correctly, required key: %s',
                    implode(',', static::REQUIRED_CONNECTION_KEYS)
                )
            );
        }
    }


    private function credentialsHaveRequiredKeys(array $credentials): bool
    {
        $matches = array_intersect(static::REQUIRED_CONNECTION_KEYS, array_keys($credentials));
        return count($matches) === count(static::REQUIRED_CONNECTION_KEYS);
    }

    abstract protected function parseCredentials(array $credentials): array;
}
