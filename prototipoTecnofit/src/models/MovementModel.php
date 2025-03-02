<?php

namespace Models;

use Utils\DataBase;

class MovementModel {

    private $db;

    public function __construct(DataBase $db = null) {
        $this->db = $db ? $db : new DataBase();
    }

    public function getRanking() {
        $sql = "SELECT
                    pr.user_id,
                    u.name AS user_name,
                    m.name AS movement_name,
                    (
                        SELECT COUNT(DISTINCT pr2.value) + 1 
                        FROM personal_record pr2 
                        WHERE pr2.movement_id = pr.movement_id 
                            AND pr2.value > MAX(pr.value)
                    ) AS position,
                    MAX(pr.value) AS personal_record,
                    MAX(pr.date) AS record_date
                FROM personal_record pr
                JOIN movement m ON pr.movement_id = m.id
                JOIN user u ON pr.user_id = u.id
                GROUP BY pr.movement_id, pr.user_id, m.name
                ORDER BY m.name, position;";

        return $this->db->query($sql);
    }

    public function getRankingV2() {
        // implemtar uma consulta mais simples e realizar a formatação no PHP mesmo
    }
}
