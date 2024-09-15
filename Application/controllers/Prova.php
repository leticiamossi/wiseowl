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
        $connMat = $this->model('materias');
        $materias = $connMat::GetMaterias("1");

        $connTurm = $this->model('turmas');
        $turmas = $connTurm::GetTurmas("1");

        $this->view('prova/formularioInicial', ['materias' => $materias, 'turmas' => $turmas]);
    }

    public function tipoQuestao()
    {
        $materia = $_POST['materia'];
        $turma = $_POST['turma'];
        $data = $_POST['data'];
        $notaMax = $_POST['notaMax'];
        $notaMed = $_POST['notaMed'];
        $obs = $_POST['obs'];

        $conn = $this->model('prova');
        $insert = $conn::AddProva($materia, $turma, $data, $notaMax, $notaMed, $obs);

        if($insert > 0){
            $this->view('prova/tipoQuestao');
        } else {
            $msg = "<script>Houve um erro. Tente Novamente!</script>";
            echo $msg;
            $location = "window.location.href = '/prova/formularioInicial";
            echo $location;
        }

    }

    public function personalizada()
    {
        $this->view('prova/personalizada');
    }

    public function ia()
    {
        $this->view('prova/ia');
    }

    public function descritiva()
    {
        $this->view('prova/descritiva');
    }
}

?>