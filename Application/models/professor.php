<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Professor
{
    public static function InsertProfessor(string $nome, string $sobrenome, string $email, string $senha)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_professores(nome_professor, sobrenome_professor, email_professor, senha_professor) VALUES (:NOME, :SOBRENOME, :EMAIL, SHA1(:SENHA));", array(':NOME' => $nome, ':SOBRENOME' => $sobrenome, ':EMAIL' => $email, ':SENHA' => $senha));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function FindProfessor(string $email, string $senha)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_professores WHERE email_professor = :EMAIL && senha_professor = SHA1(:SENHA)", array(':EMAIL' => $email, ':SENHA' => $senha));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>