<?php

use App\Helpers\App;
use App\Helpers\Config;
use App\Logger\Logger;
use App\Logger\LogLevel;

require_once __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . '/src/Exceptions/exception.php';



$logger = new Logger();

$logger->log(LogLevel::EMERGENCY, 'There is an emergency', ['exception' => 'excetion occured']);
$logger->info('User account created successfully', ['id' => 5]);


// $app = new Config();
// echo $app->get('app');
// $config = Config::get("app");
// echo $config['env'];
// // var_dump($config);



$config = new Config();
echo $config->get('app', 'app_name');
// echo $config->get('app');



$application = new App();
echo $application->getServerTime()->format("Y-m-d H:i:s") . PHP_EOL;
echo $application->getEnvironment() . PHP_EOL;
echo $application->getLogPath() . PHP_EOL;
echo $application->isDebugMode() . PHP_EOL;
