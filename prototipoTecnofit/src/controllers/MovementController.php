<?php

namespace Controllers;

use Models\MovementModel;
use Utils\HttpResponse;

class MovementController {

    private $http;
    private $movement;

    public function __construct() {
        $this->http = new HttpResponse();
        $this->movement = new MovementModel();
    }

    public function getAll() {
        try {
            $data = $this->movement->getAll();
            $this->http->response($data);
        } catch (\Exception $e) {
            // implementar uma forma de salvar o log de excessoes
            $this->http->responseError('Falha ao tratar a requisição');
        }
    }
}