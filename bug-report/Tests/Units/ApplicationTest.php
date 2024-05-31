<?php

namespace Test\Units;

use App\Helpers\App;
use DateTime;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    public function testItCanInstanceOFApplication()
    {
        self::assertInstanceOf(App::class, new App());
    }

    public function testItCanGetBasicApplicationDataset()
    {
        $application = new App();

        self::assertSame('local', $application->getEnvironment());
        self::assertNotNull($application->getLogPath());
        self::assertInstanceOf(DateTime::class, $application->getServerTime());
    }
}
