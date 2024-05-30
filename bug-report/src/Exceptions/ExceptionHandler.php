<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Helpers\App;
use Throwable, ErrorException;
use ReflectionClass;

class ExceptionHandler
{

    public function handle(Throwable $exception): void
    {
        $application = new App;
        if ($application->isDebugMode()) {
            var_dump($exception);
        } else {
            echo "This should not have happened, please try again";
        }
        exit;
    }

    public function convertErrorsToException($severity, $message, $file, $line)
    {
        throw new ErrorException($message, $severity, $severity, $file, $line);
    }

    // private function parseExceptionResponse(Throwable $exception): array
    // {
    //     $response = [];
    //     $response['code'] = $exception->getCode();
    //     $response['message'] = $exception->getMessage();
    //     $response['line'] = $exception->getLine();
    //     $response['file'] = $exception->getFile();
    //     $response['trace'] = $exception->getTrace();

    //     $object = new ReflectionClass(get_class($exception));
    //     if ($object->isSubclassOf(MainException::class)) {
    //         $response['data'] = $exception->getExtraData();
    //     }
    //     $response['exceptionClass'] = $object->getName();

    //     return $response;
    // }
}
