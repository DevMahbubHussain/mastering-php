<?php

namespace Test\Units;

use App\Contarcts\LoggerInterface;
use App\Exceptions\InvalidLogLevelArgument;
use App\Helpers\App;
use App\Logger\Logger;
use App\Logger\LogLevel;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{

    /** @var Logger $logger */
    private $logger;

    public function setUp(): void
    {
        $this->logger = new Logger();
        parent::setUp();
    }


    public function testItCanImplementsLoggerInterface()
    {
        self::assertInstanceOf(LoggerInterface::class, $this->logger);
    }

    public function testItCanCreateDifferentTypesOfLogLevel()
    {
        $this->logger->info('Testing Info logs');
        $this->logger->error('Testing Error logs');
        $this->logger->log(LogLevel::ALERT, 'Testing Alert logs');

        $app = new App();
        $fileName = sprintf("%s/%s-%s.log", $app->getLogPath(), 'local', date("j.n.Y"));
        self::assertFileExists($fileName);

        $fileContent = file_get_contents($fileName);
        self::assertStringContainsString('Testing Info logs', $fileContent);
        self::assertStringContainsString('Testing Error logs', $fileContent);
        self::assertStringContainsString(LogLevel::ALERT, $fileContent);
        unlink($fileName);
        self::assertFileDoesNotExist($fileName);
    }

    public function testItThrowsInvalidLogLevelArgumentExceptionWhenGivenAWrongLogLevel()
    {
        self::expectException(InvalidLogLevelArgument::class);
        $this->logger->log('invalid', 'Testing invalid log level');
    }
}
