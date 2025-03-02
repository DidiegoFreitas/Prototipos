<?php

namespace Models;

use Utils\DataBase;

class MovementModel {

    private $db;

    public function __construct(DataBase $db = null) {
        $this->db = $db ? $db : new DataBase();
    }

    public function getAll() {
        $sql = "SELECT
                    m.id,
                    m.name
                FROM movement m 
                ORDER BY m.id;";
        return $this->db->query($sql);
    }

    public function getRankingByMovement(int $idMovement) {
        $sql = "SELECT
                    pr.user_id,
                    u.name AS user_name,
                    m.name AS movement_name,
                    (
                        SELECT COUNT(DISTINCT pr2.value) + 1 
                        FROM personal_record pr2 
                        WHERE pr2.movement_id = pr.movement_id 
                            AND pr2.value > MAX(pr.value)
                    ) AS rank,
                    MAX(pr.value) AS personal_record,
                    MAX(pr.date) AS record_date
                FROM personal_record pr
                JOIN movement m ON pr.movement_id = m.id
                JOIN user u ON pr.user_id = u.id
                WHERE pr.movement_id = $idMovement
                GROUP BY pr.movement_id, pr.user_id
                ORDER BY m.name, rank;";
        return $this->db->query($sql);
    }

    public function getAllRanking() {
        $sql = "SELECT
                    pr.user_id,
                    u.name AS user_name,
                    m.name AS movement_name,
                    (
                        SELECT COUNT(DISTINCT pr2.value) + 1 
                        FROM personal_record pr2 
                        WHERE pr2.movement_id = pr.movement_id 
                            AND pr2.value > MAX(pr.value)
                    ) AS rank,
                    MAX(pr.value) AS personal_record,
                    MAX(pr.date) AS record_date
                FROM personal_record pr
                JOIN movement m ON pr.movement_id = m.id
                JOIN user u ON pr.user_id = u.id
                GROUP BY pr.movement_id, pr.user_id
                ORDER BY m.name, rank;";
        return $this->db->query($sql);
    }

    public function getRankingByMovementPHP(int $idMovement) {
        $sql = "SELECT
                    pr.user_id,
                    pr.movement_id,
                    u.name AS user_name,
                    m.name AS movement_name,
                    MAX(pr.value) AS personal_record,
                    MAX(pr.date) AS record_date
                FROM personal_record pr
                JOIN user u ON pr.user_id = u.id
                JOIN movement m ON pr.movement_id = m.id
                WHERE pr.movement_id = $idMovement
                GROUP BY pr.user_id, pr.movement_id;";

        $data = $this->db->query($sql);

        return $this->orderList($data);
    }

    public function getAllRankingPHP() {
        $sql = "SELECT
                    pr.user_id,
                    pr.movement_id,
                    u.name AS user_name,
                    m.name AS movement_name,
                    MAX(pr.value) AS personal_record,
                    MAX(pr.date) AS record_date
                FROM personal_record pr
                JOIN user u ON pr.user_id = u.id
                JOIN movement m ON pr.movement_id = m.id
                GROUP BY pr.user_id, pr.movement_id;";

        $data = $this->db->query($sql);

        return $this->orderList($data);
    }

    private function orderList($data) {
        $grouped = [];
        foreach ($data as $entry) {
            $grouped[$entry['movement_id']][] = $entry;
        }

        // Processar cada grupo e adicionar ranking
        $result = [];
        foreach ($grouped as $movement_id => &$users) {
            // Ordenar por personal_record (decrescente)
            usort($users, function ($a, $b) {
                return $b['personal_record'] <=> $a['personal_record'];
            });

            $rank = 0;
            $prev_record = null;

            foreach ($users as &$user) {
                // Atualiza a posição apenas se o record mudar
                if ($prev_record !== $user['personal_record']) {
                    $rank += 1;
                }
                $user['rank'] = $rank;
                $prev_record = $user['personal_record'];
                $result[] = $user;
            }
        }

        // Ordenar resultado por movement_id e rank
        usort($result, function ($a, $b) {
            return $a['movement_name'] <=> $b['movement_name'] ?: $a['rank'] <=> $b['rank'];
        });

        return $result;
    }
}