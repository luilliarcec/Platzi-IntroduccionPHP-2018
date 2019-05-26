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

$map->get('addProjects', BASE_URL . 'projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProject'
]);

$map->post('saveProjects', BASE_URL . 'projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'postSaveProject'
]);

$map->get('addUser', BASE_URL . 'users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUser'
]);

$map->post('saveUsers', BASE_URL . 'users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'postSaveUser'
]);

$map->get('loginForm', BASE_URL . 'login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);

//$map->post('saveUsers', BASE_URL . 'users/add', [
//    'controller' => 'App\Controllers\UsersController',
//    'action' => 'postAddUserAction'
//]);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo('No route');
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    echo($response->getBody());
}