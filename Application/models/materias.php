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

    public static function GetAssuntos(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT DISTINCT assunto_assunto FROM tb_assuntos WHERE materia_assunto = (
                                            SELECT materia_prova FROM tb_prova WHERE id_prova = :ID)",
                                            array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetTopicos(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_assuntos WHERE materia_assunto = (
                                            SELECT materia_prova FROM tb_prova WHERE id_prova = :ID)",
                                            array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>