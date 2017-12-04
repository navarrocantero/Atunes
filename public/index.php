<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 14/11/2017
 * Time: 00:02
 */
require_once '../vendor/autoload.php';

use Phroute\Phroute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;


include_once '../helpers.php';
include_once '../dbhelper.php';

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);
if(file_exists(__DIR__.'/../.env')){
$dotEnv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotEnv->load();
}
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => getenv('DB_HOST'),
    'database' => getenv('DB_NAME'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''

]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = $_GET['route'] ?? "/";


$router = new RouteCollector();

$router->controller('/', App\Controllers\HomeController::class);
$router->controller('/album', App\Controllers\AlbumController::class);
$router->controller('/api', App\Controllers\ApiController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$response = $dispatcher->dispatch($method, $route);

echo $response;