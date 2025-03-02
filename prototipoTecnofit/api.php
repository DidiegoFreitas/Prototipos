<?php
require_once __DIR__ . '/vendor/autoload.php';

use Controllers\RankingController;
use Utils\HttpResponse;

$http = new HttpResponse();
$rankingController = new RankingController();

$routes = [
    'ranking' => [$rankingController, 'index'],
    'rankingPHP' => [$rankingController, 'searchByPHP'],
];

$requestUri = parse_url($_GET['request'], PHP_URL_PATH);

if (array_key_exists($requestUri, $routes)) {
    call_user_func($routes[$requestUri]);
} else {
    $http->responseError('Página não encontrada', [], 404);
}