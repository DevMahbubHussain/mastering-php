<?php

namespace App\Logger;

use App\Contarcts\LoggerInterface;
use App\Exceptions\InvalidLogLevelArgument;
use App\Helpers\App;
use ReflectionClass;

class Logger implements LoggerInterface
{

    public function emergency($message, array $context = [])
    {
        $this->addRecord(LogLevel::EMERGENCY, $message, $context);
    }
    public function alert($message, array $context = [])
    {
        $this->addRecord(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = [])
    {
        $this->addRecord(LogLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = [])
    {
        $this->addRecord(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = [])
    {
        $this->addRecord(LogLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = [])
    {
        $this->addRecord(LogLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = [])
    {
        $this->addRecord(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = [])
    {
        $this->addRecord(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = [])
    {
        $object = new ReflectionClass(LogLevel::class);
        $validLogLevelsArray = $object->getConstants();
        if (!in_array($level, $validLogLevelsArray)) {
            throw new InvalidLogLevelArgument($level, $validLogLevelsArray);
        }
        $this->addRecord($level, $message, $context);
    }

    private function addRecord(string $level, string $message, array $context = [])
    {
        $application = new App();
        $date = $application->getServerTime()->format('Y-m-d H:i:s');
        $logPath = $application->getLogPath();
        $env = $application->getEnvironment();
        $details = sprintf(
            "%s - Level: %s - Message: %s - Context: %s",
            $date,
            $level,
            $message,
            json_encode($context)
        ) . PHP_EOL;

        $fileName = sprintf("%s/%s-%s.log", $logPath, $env, date("j.n.Y"));
        var_dump($fileName);
        file_put_contents($fileName, $details, FILE_APPEND);
    }
}
