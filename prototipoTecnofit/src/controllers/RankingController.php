<?php

namespace Controllers;

use Models\MovementModel;
use Utils\HttpResponse;
use Utils\StatusEnum;

class RankingController {

    private $http;
    private $movement;

    public function __construct() {
        $this->http = new HttpResponse();
        $this->movement = new MovementModel();
    }

    public function index() {
        try {
            $data = $this->movement->getRanking();
            $this->http->response($data);
        } catch (\Exception $e) {
            // implementar uma forma de salvar o log de excessoes
            $this->http->responseError('Falha ao tratar a requisição');
        }
    }

    public function searchByPHP() {
        try {
            // $data = $this->movement->getRanking();
            // $this->http->response($data);
        } catch (\Exception $e) {
            // implementar uma forma de salvar o log de excessoes
            $this->http->responseError('Falha ao tratar a requisição');
        }
    }
}