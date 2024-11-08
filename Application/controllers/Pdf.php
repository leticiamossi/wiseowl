<?php

use Application\core\Controller;

class Pdf extends Controller
{
    public function gerar($id)
    {
        $connP = $this->model('prova');
        $questoes = $connP::GetQuestoes($id);
        $prova = $connP::GetProva($id);
        $this->view('pdf/gerar', ['questoes' => $questoes, 'prova' => $prova]);
    }

    public function gerarGabarito($id)
    {
        $connP = $this->model('prova');
        $questoes = $connP::GetQuestoes($id);
        $prova = $connP::GetProva($id);
        $this->view('pdf/gerarGabarito', ['questoes' => $questoes, 'prova' => $prova]);
    }
}

?>