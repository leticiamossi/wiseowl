<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Gabarito
{
    public static function insertGabarito(string $idAluno, string $idQuestaoProva, string $resposta, string $correcao)
    {
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_gabaritos(aluno_gabarito, questao_gabarito, respostaAluno_gabarito, correcao_gabarito)
                                            VALUES (:ALUNO, :QUESTAO, :RESP, :COR)", array(':ALUNO' => $idAluno, ':QUESTAO' => $idQuestaoProva, ':RESP' => $resposta, ':COR' => $correcao));
        return $result->rowCount();
    }

    public static function getResultados(string $idProva)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_prova AS p JOIN tb_questoesProva AS qp ON qp.prova_questaoProva = p.id_prova
                                                                    JOIN tb_gabaritos AS g ON g.questao_gabarito = qp.id_questaoProva
                                                                    JOIN tb_alunos AS a ON g.aluno_gabarito = a.id_aluno
                                                                    WHERE p.id_prova = :ID 
                                                                    ORDER BY a.nome_aluno", array(':ID' => $idProva));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>