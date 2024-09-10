<?php

use Application\core\Controller;

class Prova extends Controller 
{
    public function index()
    {
        $this->view('prova/index');
    }

    public function formularioInicial()
    {
        $this->view('prova/formularioInicial');
    }

    public function tipoQuestao()
    {
        $this->view('prova/tipoQuestao');
    }
}

?>