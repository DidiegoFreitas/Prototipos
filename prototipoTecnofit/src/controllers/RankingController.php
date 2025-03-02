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

    public function getAll() {
        try {
            $data = $this->movement->getAllRanking();
            $this->http->response($data);
        } catch (\Exception $e) {
            // implementar uma forma de salvar o log de excessoes
            $this->http->responseError('Falha ao tratar a requisição');
        }
    }

    public function getByMovement($idMovement) {
        try {
            $data = $this->movement->getRankingByMovement($idMovement);
            $this->http->response($data);
        } catch (\Exception $e) {
            // implementar uma forma de salvar o log de excessoes
            $this->http->responseError('Falha ao tratar a requisição');
        }
    }

    public function getAllPHP() {
        try {
            $data = $this->movement->getAllRankingPHP();
            $this->http->response($data);
        } catch (\Exception $e) {
            // implementar uma forma de salvar o log de excessoes
            $this->http->responseError('Falha ao tratar a requisição');
        }
    }

    public function getByMovementPHP($idMovement) {
        try {
            $data = $this->movement->getRankingByMovementPHP($idMovement);
            $this->http->response($data);
        } catch (\Exception $e) {
            // implementar uma forma de salvar o log de excessoes
            $this->http->responseError('Falha ao tratar a requisição');
        }
    }
}