<?php

namespace Utils;

class HttpResponse {
    public function response(Array $data = [], string $msg = '', string $status = StatusEnum::SUCCESS, int $httpCode = null) {
        if ($httpCode) {
            http_response_code($httpCode);
        } else if (in_array($status, [StatusEnum::SUCCESS, StatusEnum::ERROR])) {
            $httpCode = $status == StatusEnum::SUCCESS ? 200 : 400;
            http_response_code($httpCode);
        }
        $res = [
            'status' => $status,
            'data' => $data,
            'msg' => $msg
        ];
        echo json_encode($res, JSON_PRETTY_PRINT);
        die;
    }

    public function responseError(string $msg = '', Array $data = [], int $httpCode = null) {
        $this->response($data, $msg, StatusEnum::ERROR, $httpCode);
    }

    public function responseMessage(string $msg = '', string $status = StatusEnum::SUCCESS, int $httpCode = null) {
        $this->response([], $msg, $status, $httpCode);
    }
}