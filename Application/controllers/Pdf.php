<?php

use Application\core\Controller;

class Pdf extends Controller
{
    public function gerar($id)
    {
        $connP = $this->model('prova');
        $questoes = $connP::GetQuestoes($id);
        $questoesValidas = [];
        foreach($questoes as $questao){
            if($questao['status_questaoProva'] != "Anulada"){
                array_push($questoesValidas, $questao);
            }
        }
        $this->view('pdf/gerar', ['questoes' => $questoesValidas]);
    }

    public function gerarGabarito($id)
    {
        $connP = $this->model('prova');
        $questoes = $connP::GetQuestoes($id);
        $questoesValidas = [];
        foreach($questoes as $questao){
            if($questao['status_questaoProva'] != "Anulada"){
                array_push($questoesValidas, $questao);
            }
        }
        $this->view('pdf/gerarGabarito', ['questoes' => $questoesValidas]);
    }
}

?>