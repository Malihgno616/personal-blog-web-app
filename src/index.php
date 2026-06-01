<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Controller/ArticleController.php';

use Controller\ArticleController;
use FastRoute\Dispatcher;

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$id = $_GET['/article'] ?? null;

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
    $r->addRoute('GET', '/login', 'login');
    $r->addRoute('GET', '/logout', 'logout');
    $r->addRoute('GET', '/article/{id}', 'article');
    $r->addRoute('GET', '/articles/{page:\d+}', 'articles');
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
                $articleController = new ArticleController();
                $page = isset($routeInfo[2]['page'])
                    ? (int)$routeInfo[2]['page']
                    : 1;
                $limit = 3;
                $offset = ($page - 1) * $limit;
                require_once __DIR__ . '/View/pages/articles.php';
                break;
            case 'article':
                $articleController = new ArticleController();
                $id = $routeInfo[2]['id'];
                require_once __DIR__ . '/View/pages/article.php';
                break;
            case 'admin':
                require_once __DIR__ . '/View/pages/admin-page.php';
                break;
            case 'login':
                require_once __DIR__ . '/View/pages/login.php';
                break;
            case 'logout':
                require_once __DIR__ . '/View/pages/logout.php';
                break;
            default:
                $articleController = new ArticleController();
                require_once __DIR__ . '/View/pages/home.php';
        }
        break;
}