<?php

use Application\core\Controller;

class Relatorio extends Controller
{
    public function index()
    {
        $id = 1;
        $connMat = $this->model('materias');
        $materias = $connMat::GetAllAssuntos($id);

        $connT = $this->model('turmas');
        $turmas = $connT::GetTurmas($id);

        $connG = $this->model('gabarito');
        $resultados = $connG::GetAllResultados($id);

        $this->view('relatorio/index', ['materias' => $materias, 'turmas' => $turmas, 'resultados' => $resultados]);
    }

    public function prova($id)
    {
        $connG = $this->model('gabarito');
        $resultados = $connG::getResultados($id);

        $this->view('relatorio/prova', ['resultados' => $resultados]);
    }
}
