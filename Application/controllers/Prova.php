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
        //$insert = $conn::AddProva($materia, $turma, $data, $notaMax, $notaMed, $obs);
        $insert = 2;
        if($insert > 0){
            //$id = $conn::GetIdProva($materia, $turma, $data, $notaMax, $notaMed, $obs);
            $id = "1";
            $num = 1;
            $this->view('prova/tipoQuestao', ['id' => $id, 'num' => $num]);
        } else {
            $msg = "<script>Houve um erro. Tente Novamente!</script>";
            echo $msg;
            $location = "window.location.href = '/prova/formularioInicial";
            echo $location;
        }

    }

    public function personalizada($idNum)
    {
        $aux = explode('-',$idNum);
        $id = $aux[0];
        $num = $aux[1];
        $this->view('prova/personalizada', ['id' => $id, 'num' => $num]);
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