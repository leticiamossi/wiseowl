<?php

use Application\core\Controller;

class Banco extends Controller
{
    public function questoes($id)
    {
        $connP = $this->model('prova');
        $aux = $connP::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;

        $materia = $connP::GetMateria($id);

        $connMat = $this->model('materias');
        $assuntos = $connMat::GetAssuntos($id);
        $topicos = $connMat::GetTopicos($id);

        $connB = $this->model('banco');
        $questoes = $connB::GetQuestoes($materia[0]['materia_prova']);

        $this->view('bancoQuestoes/index', ['id' => $id, 'num' => $num, 'questoes' => $questoes, 'assuntos' => $assuntos, 'topicos' => $topicos]);
        
    }
}

?>