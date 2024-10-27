<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Turmas
{
    public static function InsertTurma(string $nome, string $ano, string $prof, string $escola)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_turmas(nome_turma, ano_turma, professor_turma, escola_turma) VALUES (:NOME, :ANO, :PROF, :ESC);", array(':NOME' => $nome, ':ANO' => $ano, ':PROF' => $prof, ':ESC' => $escola));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetTurmas(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_turmas AS t LEFT JOIN tb_escolas AS e ON t.escola_turma = e.id_escola WHERE ano_turma = YEAR(NOW()) && professor_turma = :ID", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>