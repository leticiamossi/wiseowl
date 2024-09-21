<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Questao
{
    public static function AddQuestao(string $enunciado, string $imagem, string $a, string $b, string $c, string $d, string $e, string $certa, string $tamanho, string $prof, string $origem)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_questoesObj(questao_questao, imagem_questao, respostaUm_questao, respostaDois_questao, respostaTres_questao, respostaQuatro_questao, respostaCinco_questao, respostaCerta_questao, tamanho_questao, adicionadaPor_questao, origem_questao)
                                                    VALUES (:ENU, :IMG, :A, :B, :C, :D, :E, :CER, :TAM, :PROF, :ORIG)",
                                                    array(':ENU' => $enunciado, ':IMG' => $imagem, ':A' => $a, ':B' => $b, ':C' => $c, ':D' => $d, ':E' => $e, ':CER' => $certa, ':TAM' => $tamanho, ':PROF' => $prof, ':ORIG' => $origem));
        return $result->rowCount();
    }

    public static function AddExtras(string $id, string $assunto, string $dificuldade)
    {
        $conn = new Database();
        $result = $conn->executeQuery("UPDATE tb_questoesObj SET assunto_questao = :ASS, dificuldade_questao = :DIF WHERE id_questao = :ID",
                                        array(':ASS' => $assunto, ':DIF' => $dificuldade, ':ID' => $id));
        return $result->rowCount();
    }

    public static function GetIdQuestao(string $enunciado, string $imagem, string $a, string $b, string $c, string $d, string $e, string $certa, string $tamanho, string $prof, string $origem)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT id_questao FROM tb_questoesObj WHERE questao_questao = :ENU &&
                                                                                imagem_questao = :IMG &&
                                                                                respostaUm_questao = :A &&
                                                                                respostaDois_questao = :B &&
                                                                                respostaTres_questao = :C &&
                                                                                respostaQuatro_questao = :D &&
                                                                                respostaCinco_questao = :E &&
                                                                                respostaCerta_questao =:CER &&
                                                                                tamanho_questao = :TAM &&
                                                                                adicionadaPor_questao = :PROF &&
                                                                                origem_questao = :ORIG",
                                                    array(':ENU' => $enunciado, ':IMG' => $imagem, ':A' => $a, ':B' => $b, ':C' => $c, ':D' => $d, ':E' => $e, ':CER' => $certa, ':TAM' => $tamanho, ':PROF' => $prof, ':ORIG' => $origem));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>