<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Banco
{
    public static function GetQuestoes(string $materia)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_questoesObj AS qo JOIN tb_assuntos AS a ON qo.assunto_questao = a.id_assunto WHERE materia_assunto = :ID",
                                        array(':ID' => $materia));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>