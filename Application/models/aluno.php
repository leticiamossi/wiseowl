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

    public static function GetAlunosProva(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_alunos AS a JOIN tb_turmas AS t ON a.turma_aluno = t.id_turma
                                                                    JOIN tb_prova AS p ON t.id_turma = p.turma_prova
                                                                    WHERE p.id_prova = :ID", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>