<?php

use Application\core\Controller;

class Pdf extends Controller
{
    public function gerar($id)
    {
        $connP = $this->model('prova');
        $questoes = $connP::GetQuestoes($id);
        $this->view('pdf/gerar', ['questoes' => $questoes]);
    }
}

?>