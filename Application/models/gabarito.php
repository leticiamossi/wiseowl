<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Gabarito
{
    public static function insertGabarito(string $idAluno, string $idQuestaoProva, string $resposta, string $divisor){
        $conn = new Database();
        $result = $conn->executeQuery("INSERT INTO tb_gabaritos(aluno_gabarito, questao_gabarito, respostaAluno_gabarito, divisorNota_gabarito)
                                            VALUES (:ALUNO, :QUESTAO, :RESP, :DIV)", array(':ALUNO' => $idAluno, ':QUESTAO' => $idQuestaoProva, ':RESP' => $resposta, ':DIV' => $divisor));
        return $result->rowCount();
    }


}

?>