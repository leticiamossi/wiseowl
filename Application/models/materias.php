<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Materias 
{
    public static function GetMaterias(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_disciplinas AS d JOIN tb_materias AS m ON d.materia_disciplina = m.id_materia
                                                                        JOIN tb_professores AS p ON d.professor_disciplina = p.id_professor
                                                                        WHERE p.id_professor = :ID
                                                                        ORDER BY m.nome_materia",
                                                                        array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>