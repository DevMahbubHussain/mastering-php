<?php

declare(strict_types=1);

namespace App\Contarcts;

interface DatabaseConnectionInterface
{
    public function connect();
    public function getConnection();
}
