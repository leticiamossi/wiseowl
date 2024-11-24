<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Questao
{
    public static function AddQuestao(string $enunciado, string $imagem, string $a, string $b, string $c, string $d, string $e, string $certa, string $tamanho, string $prof, string $origem)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_questoesobj(questao_questao, imagem_questao, respostaUm_questao, respostaDois_questao, respostaTres_questao, respostaQuatro_questao, respostaCinco_questao, respostaCerta_questao, tamanho_questao, adicionadaPor_questao, origem_questao)
                                                    VALUES (:ENU, :IMG, :A, :B, :C, :D, :E, :CER, :TAM, :PROF, :ORIG)",
                                                    array(':ENU' => $enunciado, ':IMG' => $imagem, ':A' => $a, ':B' => $b, ':C' => $c, ':D' => $d, ':E' => $e, ':CER' => $certa, ':TAM' => $tamanho, ':PROF' => $prof, ':ORIG' => $origem));
        return $result->rowCount();
    }

    public static function AddQuestaoDesc(string $enunciado, string $arquivoNovo, string $modeloResp, string $tamanho, string $linhas) 
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_questaodesc(questao_questaoDesc, imagem_questaoDesc, modeloResp_questaoDesc, tamanho_questaoDesc, numLinhas_questaoDesc) 
                                                    VALUES (:ENU, :IMG, :MOD, :TAM, :LIN)",
                                                    array(':ENU' => $enunciado, ':IMG' => $arquivoNovo, ':MOD' => $modeloResp, ':TAM' => $tamanho, ':LIN' => $linhas));
        return $result->rowCount();
    }

    public static function AddExtras(string $id, string $assunto, string $dificuldade)
    {
        $conn = new Database();
        $result = $conn->executeQuery("UPDATE tb_questoesobj SET assunto_questao = :ASS, dificuldade_questao = :DIF WHERE id_questao = :ID",
                                        array(':ASS' => $assunto, ':DIF' => $dificuldade, ':ID' => $id));
        return $result->rowCount();
    }

    public static function AddExtrasDesc(string $id, string $assunto, string $dificuldade)
    {
        $conn = new Database();
        $result = $conn->executeQuery("UPDATE tb_questaodesc SET assunto_questaoDesc = :ASS, dificuldade_questaoDesc = :DIF WHERE id_questaoDesc = :ID",
                                        array(':ASS' => $assunto, ':DIF' => $dificuldade, ':ID' => $id));
        return $result->rowCount();
    }

    public static function GetIdQuestao(string $enunciado, string $imagem, string $a, string $b, string $c, string $d, string $e, string $certa, string $tamanho, string $prof, string $origem)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT id_questao FROM tb_questoesobj WHERE questao_questao = :ENU &&
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

    public static function GetIdQuestaoDesc(string $enunciado, string $imagem, string $modeloResp, string $tamanho, string $linhas)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT id_questaoDesc AS id_questao FROM tb_questaodesc WHERE questao_questaoDesc = :ENU &&
                                                                                imagem_questaoDesc = :IMG &&
                                                                                modeloResp_questaoDesc = :MOD &&
                                                                                tamanho_questaoDesc = :TAM &&
                                                                                numLinhas_questaoDesc = :LIN",
                                                    array(':ENU' => $enunciado, ':IMG' => $imagem, ':MOD' => $modeloResp,':TAM' => $tamanho, ':LIN' => $linhas));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetQuestao(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_questoesobj WHERE id_questao = :ID",
                                        array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>