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


include_once '../config.php';
include_once '../connectdb.php';
include_once '../helpers.php';
include_once '../dbhelper.php';

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

$dotEnv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotEnv->load();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => getenv('DB_HOST'),
    'name' => getenv('DB_NAME'),
    'user' => getenv('DB_USER'),
    'pass' => getenv('DB_PASS'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''

]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = $_GET['route'] ?? "/";
function render($fileName, $params = [])
{
    // Activa el buffer interno de PHP para que toda la salida que va al navegador
    // se guarde en dicho buffer interno.
    ob_start(); // Omite cualquier salida de la aplicación y la almacena internamente

    extract($params); // Extrae los datos del array asociativo $params y los convierte en variables

    require($fileName);
    return ob_get_clean(); // Se trae los datos del buffer interno y lo limpia
}

$router = new RouteCollector();
$regEx = ("/([A-Z)|(%))\s])\w+/g/");
//dameDato(mb_ereg($regEx, "jose"));
mb_ereg($regEx, "jose");
$router->controller('/', App\Controllers\HomeController::class);
$router->controller('/album', App\Controllers\AlbumController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$response = $dispatcher->dispatch($method, $route);
echo $response;