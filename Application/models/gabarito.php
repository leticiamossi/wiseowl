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
        $result = $conn->executeQuery("SELECT * FROM tb_prova AS p JOIN tb_questoesprova AS qp ON qp.prova_questaoProva = p.id_prova
                                                                    JOIN tb_gabaritos AS g ON g.questao_gabarito = qp.id_questaoProva
                                                                    JOIN tb_alunos AS a ON g.aluno_gabarito = a.id_aluno
                                                                    JOIN tb_turmas AS t ON t.id_turma = a.turma_aluno
                                                                    LEFT JOIN tb_questaodesc AS qd ON qp.questaoDesc_questaoProva = qd.id_questaoDesc
                                                                    LEFT JOIN tb_questoesobj AS qo ON qp.questaoObj_questaoProva = qo.id_questao
                                                                    LEFT JOIN tb_assuntos AS ass ON qo.assunto_questao = ass.id_assunto || qd.assunto_questaoDesc = ass.id_assunto
                                                                    LEFT JOIN tb_materias AS m ON ass.materia_assunto = m.id_materia
                                                                    WHERE p.id_prova = :ID 
                                                                    ORDER BY a.nome_aluno", array(':ID' => $idProva));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllResultados(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_prova AS p JOIN tb_questoesprova AS qp ON qp.prova_questaoProva = p.id_prova
                                                                    JOIN tb_gabaritos AS g ON g.questao_gabarito = qp.id_questaoProva
                                                                    JOIN tb_alunos AS a ON g.aluno_gabarito = a.id_aluno
                                                                    JOIN tb_turmas AS t ON t.id_turma = a.turma_aluno
                                                                    LEFT JOIN tb_questaodesc AS qd ON qp.questaoDesc_questaoProva = qd.id_questaoDesc
                                                                    LEFT JOIN tb_questoesobj AS qo ON qp.questaoObj_questaoProva = qo.id_questao
                                                                    LEFT JOIN tb_assuntos AS ass ON qo.assunto_questao = ass.id_assunto || qd.assunto_questaoDesc = ass.id_assunto
                                                                    LEFT JOIN tb_materias AS m ON ass.materia_assunto = m.id_materia
                                                                    WHERE t.professor_turma = :ID 
                                                                    ORDER BY a.nome_aluno", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getResultadosQuestao(string $idQuestaoProva)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_prova AS p JOIN tb_questoesprova AS qp ON qp.prova_questaoProva = p.id_prova
                                                                    JOIN tb_gabaritos AS g ON g.questao_gabarito = qp.id_questaoProva
                                                                    JOIN tb_alunos AS a ON g.aluno_gabarito = a.id_aluno
                                                                    JOIN tb_turmas AS t ON t.id_turma = a.turma_aluno
                                                                    LEFT JOIN tb_questaodesc AS qd ON qp.questaoDesc_questaoProva = qd.id_questaoDesc
                                                                    LEFT JOIN tb_questoesobj AS qo ON qp.questaoObj_questaoProva = qo.id_questao
                                                                    LEFT JOIN tb_assuntos AS ass ON qo.assunto_questao = ass.id_assunto || qd.assunto_questaoDesc = ass.id_assunto
                                                                    LEFT JOIN tb_materias AS m ON ass.materia_assunto = m.id_materia
                                                                    WHERE qp.id_questaoProva = :ID 
                                                                    ORDER BY a.nome_aluno", array(':ID' => $idQuestaoProva));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getResultadosAluno(string $idQuestaoProva)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_prova AS p JOIN tb_questoesprova AS qp ON qp.prova_questaoProva = p.id_prova
                                                                    JOIN tb_gabaritos AS g ON g.questao_gabarito = qp.id_questaoProva
                                                                    JOIN tb_alunos AS a ON g.aluno_gabarito = a.id_aluno
                                                                    JOIN tb_turmas AS t ON t.id_turma = a.turma_aluno
                                                                    LEFT JOIN tb_questaodesc AS qd ON qp.questaoDesc_questaoProva = qd.id_questaoDesc
                                                                    LEFT JOIN tb_questoesobj AS qo ON qp.questaoObj_questaoProva = qo.id_questao
                                                                    LEFT JOIN tb_assuntos AS ass ON qo.assunto_questao = ass.id_assunto || qd.assunto_questaoDesc = ass.id_assunto
                                                                    LEFT JOIN tb_materias AS m ON ass.materia_assunto = m.id_materia
                                                                    WHERE a.id_aluno = :ID 
                                                                    ORDER BY a.nome_aluno", array(':ID' => $idQuestaoProva));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getResultadosTurmaAluno(string $idAluno)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tb_prova AS p JOIN tb_questoesprova AS qp ON qp.prova_questaoProva = p.id_prova
                                                                    JOIN tb_gabaritos AS g ON g.questao_gabarito = qp.id_questaoProva
                                                                    JOIN tb_alunos AS a ON g.aluno_gabarito = a.id_aluno
                                                                    JOIN tb_turmas AS t ON t.id_turma = a.turma_aluno
                                                                    LEFT JOIN tb_questaodesc AS qd ON qp.questaoDesc_questaoProva = qd.id_questaoDesc
                                                                    LEFT JOIN tb_questoesobj AS qo ON qp.questaoObj_questaoProva = qo.id_questao
                                                                    LEFT JOIN tb_assuntos AS ass ON qo.assunto_questao = ass.id_assunto || qd.assunto_questaoDesc = ass.id_assunto
                                                                    LEFT JOIN tb_materias AS m ON ass.materia_assunto = m.id_materia
                                                                    WHERE t.id_turma = (SELECT turma_aluno FROM tb_alunos WHERE id_aluno = :ID)
                                                                    ORDER BY a.nome_aluno", array(':ID' => $idAluno));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>