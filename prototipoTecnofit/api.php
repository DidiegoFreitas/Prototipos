<?php
require_once __DIR__ . '/vendor/autoload.php';

use Controllers\RankingController;
use Controllers\MovementController;
use Utils\HttpResponse;

$http = new HttpResponse();
$rankingController = new RankingController();
$movementController = new MovementController();

$routes = [
    'movement' => [$movementController, 'getAll'],
    'ranking' => [$rankingController, 'getAll'],
    'ranking/{idMovement}' => [$rankingController, 'getByMovement'],
    'rankingPHP' => [$rankingController, 'getAllPHP'],
    'rankingPHP/{idMovement}' => [$rankingController, 'getByMovementPHP'],
];

$requestUri = trim($_GET['request'], '/');

if (array_key_exists($requestUri, $routes)) {
    call_user_func($routes[$requestUri]);
} else {
    // Converte as rotas dinâmicas em expressões regulares
    foreach ($routes as $route => $action) {
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_]+)', $route);
        $pattern = str_replace('/', '\/', $pattern); // Escapa barras
        $pattern = '/^' . $pattern . '$/';

        if (preg_match($pattern, $requestUri, $matches)) {
            array_shift($matches); // Remove o primeiro elemento (URL completa)
            call_user_func_array($action, $matches); // Passa os valores dinâmicos como argumentos
            exit;
        }
    }
    $http->responseError('Página não encontrada', [], 404);
}