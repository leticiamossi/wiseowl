<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Escola
{
    public static function InsertEscola(string $nome, string $logo, string $idP)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_escolas(nome_escola, logo_escola, professor_escola) VALUES (:NOME, :IMG, :ID);", array(':NOME' => $nome, ':IMG' => $logo, ':ID' => $idP));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetEscolas(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_escolas WHERE professor_escola = :ID", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>