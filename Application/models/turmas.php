<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Turmas
{
    public static function GetTurmas(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_turmas WHERE ano_turma = YEAR(NOW()) && professor_turma = :ID", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>