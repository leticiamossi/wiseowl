<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Prova
{
    public static function AddProva(string $materia, string $turma, string $data, string $notaMax, string $notaMed, string $obs)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_prova(materia_prova, turma_prova, data_prova, notaMax_prova, notaMed_prova, observacao_prova)
                                        VALUES (:MAT, :TUR, :DIA, :MAX, :MED, :OBS)",
                                        array(':MAT' => $materia, ':TUR' => $turma, ':DIA' => $data, ':MAX' => $notaMax, ':MED' => $notaMed, ':OBS' => $obs));
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
}

?>