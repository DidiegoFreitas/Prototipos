<?php

namespace Utils;

class DataBase {
    private $conn;

    public function __construct() {
        $config = parse_ini_file('./.env');

        $this->conn = new \mysqli(
            $config['DB_HOST'],
            $config['DB_USER'],
            $config['DB_PASSWORD'],
            $config['DB_NAME'],
            $config['DB_PORT']
        );

        if ($this->conn->connect_error) {
            die("Erro de conexão: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die("Erro na preparação da query: " . $this->conn->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function execute($sql) {
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die("Erro na preparação da query: " . $this->conn->error);
        }

        return $stmt->execute();
    }

    public function close() {
        $this->conn->close();
    }
}