<?php
// Inicio bloque para mostrar errores (Solos ambiente de DESARROLLO)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Fin bloque de errores

require_once('../vendor/autoload.php');

define('BASE_URL', '/Platzi-IntroduccionPHP-2018/');

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cursophp',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

function printElement($job)
{
//    if (!$job->visible) {
//        return;
//    }
    echo("
        <li class='work-position'>
            <h5>" . $job->title . "</h5>
            <p>" . $job->description . "</p>
            <p>" . $job->getDurationAsString() . "</p>
            <strong>Achievements:</strong>
            <ul>
                <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
                <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
            </ul>
        </li>
    ");
}

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

$map->get('index', BASE_URL, [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'IndexAction'
]);

$map->get('addJobs', BASE_URL . 'jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);

$map->post('saveJobs', BASE_URL . 'jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo('No route');
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $controller->$actionName($request);
//    var_dump($route->handler);
//    require($route->handler);
}

//var_dump($route->handler);

//var_dump($request->getUri()->getPath());
//$route = $_GET['route'] ?? '/';
//if($route == '/') {
//    require('../index.php');
//} elseif ($route == 'addJob') {
//    require('../addJob.php');
//}

