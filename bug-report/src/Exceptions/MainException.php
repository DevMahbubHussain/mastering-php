<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Throwable;

class MainException extends Exception
{
    protected $data = [];

    public function __construct(
        string $message = "",
        array $data = [],
        int $code = 0,
        Throwable $previous = null
    ) {
        $this->data = $data;
        parent::__construct($message, $code, $previous);
    }

    public function getExtraData(): array
    {
        return $this->data;
    }
}
