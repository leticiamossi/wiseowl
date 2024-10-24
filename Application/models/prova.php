<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Prova
{
    public static function GetProvas(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_prova AS p JOIN tb_turmas AS t ON p.turma_prova = t.id_turma 
                                                                    JOIN tb_materias AS m ON m.id_materia = p.materia_prova
                                                                    WHERE t.professor_turma = :ID", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function AddProva(string $materia, string $turma, string $data, string $notaMax, string $notaMed, string $obs)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_prova(materia_prova, turma_prova, data_prova, notaMax_prova, notaMed_prova, observacao_prova)
                                        VALUES (:MAT, :TUR, :DIA, :MAX, :MED, :OBS)",
                                        array(':MAT' => $materia, ':TUR' => $turma, ':DIA' => $data, ':MAX' => $notaMax, ':MED' => $notaMed, ':OBS' => $obs));
        return $result->rowCount();
    }

    public static function AddQuestaoObj(string $idProva, string $idQuestao, string $peso)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_questoesProva(prova_questaoProva,questaoObj_questaoProva,peso_questaoProva)
                                        VALUES (:PROVA, :QUESTAO, :PESO)", array(':PROVA' => $idProva, ':QUESTAO' => $idQuestao, ':PESO' => $peso));
        return $result->rowCount();
    }

    public static function AddQuestaoDesc(string $idProva, string $idQuestao, string $peso)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_questoesProva(prova_questaoProva,questaoDesc_questaoProva,peso_questaoProva)
                                        VALUES (:PROVA, :QUESTAO, :PESO)", array(':PROVA' => $idProva, ':QUESTAO' => $idQuestao, ':PESO' => $peso));
        return $result->rowCount();
    }

    public static function GetIdProva(string $materia, string $turma, string $data, string $notaMax, string $notaMed, string $obs)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT id_prova FROM tb_prova WHERE materia_prova = :MAT &&
                                                                            turma_prova = :TUR &&
                                                                            data_prova = :DIA &&
                                                                            notaMax_prova = :MAX &&
                                                                            notaMed_prova = :MED &&
                                                                            observacao_prova = :OBS",
                                                                            array(':MAT' => $materia, ':TUR' => $turma, ':DIA' => $data, ':MAX' => $notaMax, ':MED' => $notaMed, ':OBS' => $obs));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function CountQuestoes(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT COUNT(id_questaoProva) AS num_questao FROM tb_questoesProva WHERE prova_questaoProva = :ID",
                                        array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetMateria(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT materia_prova FROM tb_prova WHERE id_prova = :ID",
                                        array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetQuestoes(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_questoesProva AS qp LEFT JOIN tb_questoesObj AS qo ON qp.questaoObj_questaoProva = qo.id_questao
                                                                            LEFT JOIN tb_questaoDesc AS qd ON qp.questaoDesc_questaoProva = qd.id_questaoDesc 
                                                                            WHERE qp.prova_questaoProva = :ID 
                                                                            ORDER BY qp.id_questaoProva", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function AnularQuestao(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("UPDATE tb_questoesProva SET status_questaoProva = 'Anulada' WHERE id_questaoProva = :ID", array(':ID' => $id));
        $result->rowCount();
    }
}

?>