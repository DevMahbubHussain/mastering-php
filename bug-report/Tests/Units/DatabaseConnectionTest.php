<?php

namespace Test\Units;

use App\Contarcts\DatabaseConnectionInterface;
use App\Database\MYSQLiConnection;
use App\Database\PDOConnection;
use App\Exceptions\MissingArgumentException;
use App\Helpers\Config;
use mysqli;
use PDO;
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{

    public function testItThrowMissingArgumentExceptionWithWrongCredentialKeys()
    {
        self::expectException(MissingArgumentException::class);
        $credentials = [];
        $pdoHandler = new PDOConnection($credentials);
    }
    public function testItCanConnectionWithPDOApi()
    {
        $credentials = $this->getCredentials("pdo");
        $pdoHandler = (new PDOConnection($credentials))->connect();
        self::assertInstanceOf(DatabaseConnectionInterface::class, $pdoHandler);
        return $pdoHandler;
        // self::assertNotNull($pdoHandler);
    }

    /**
     * Undocumented function
     * @depends testItCanConnectionWithPDOApi
     * @param DatabaseConnectionInterface $connection
     * @return void
     */
    public function testItIsAValidPdoConnection(DatabaseConnectionInterface $connection)
    {
        self::assertInstanceOf(PDO::class, $connection->getConnection());
    }


    // for mysqli driver 


    public function testItCanConnectionWithMYSQLiApi()
    {
        $credentials = $this->getCredentials("mysqli");
        $mysqliHandler = (new MYSQLiConnection($credentials))->connect();
        self::assertInstanceOf(DatabaseConnectionInterface::class, $mysqliHandler);
        return $mysqliHandler;
        // self::assertNotNull($pdoHandler);
    }

    /**
     * Undocumented function
     * @depends testItCanConnectionWithMYSQLiApi
     * @param DatabaseConnectionInterface $connection
     * @return void
     */
    public function testItIsAValidMYSQLiConnection(DatabaseConnectionInterface $connection)
    {
        self::assertInstanceOf(mysqli::class, $connection->getConnection());
    }


    public function getCredentials(string $type)
    {
        return array_merge(
            Config::get("database", $type),
            ['db_name' => 'bug_app_test']
        );
    }
}
