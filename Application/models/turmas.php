<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Turmas
{
    public static function InsertTurma(string $nome, string $ano, string $prof)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_turmas(nome_turma, ano_turma, professor_turma) VALUES (:NOME, :ANO, :PROF);", array(':NOME' => $nome, ':ANO' => $ano, ':PROF' => $prof));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetTurmas(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_turmas WHERE ano_turma = YEAR(NOW()) && professor_turma = :ID", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>