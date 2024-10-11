<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Aluno 
{
    public static function InsertAluno(string $nome, string $sobrenome, string $turma)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_alunos(nome_aluno, sobrenome_aluno, turma_aluno) VALUES (:NOME, :SOBRENOME, :TURMA);", array(':NOME' => $nome, ':SOBRENOME' => $sobrenome, ':TURMA' => $turma));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>