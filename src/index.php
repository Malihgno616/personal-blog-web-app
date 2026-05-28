<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use FastRoute\Dispatcher;

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$uri = rawurldecode($uri);

$basePath = '/personal-blog-web-app';

if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

if ($uri === '//') {
    $uri = '/';
}

function url($path) {
    return '/personal-blog-web-app/' . ltrim($path, '/');
}

$uri = '/' . trim($uri, '/');

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'home');
    $r->addRoute('GET', '/articles', 'articles');
    $r->addRoute('GET', '/admin', 'admin');
    $r->addRoute('GET', '/login-adm', 'login-adm');
    $r->addRoute('GET', '/logout', 'logout');
});
    
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {

    case Dispatcher::NOT_FOUND:
        echo "404 - Página não encontrada";
        break;

    case Dispatcher::METHOD_NOT_ALLOWED:
        echo "405 - Método não permitido";
        break;

    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        switch ($handler) {
            case 'articles':
                require_once __DIR__ . '/View/pages/articles.php';
                break;
            case 'admin':
                require_once __DIR__ . '/View/pages/admin-page.php';
                break;
            case 'login-adm':
                require_once __DIR__ . '/View/pages/login-adm.php';
                break;
            case 'logout':
                require_once __DIR__ . '/View/pages/logout.php';
                break;
            default:
                require_once __DIR__ . '/View/pages/home.php';

        }
        break;
}