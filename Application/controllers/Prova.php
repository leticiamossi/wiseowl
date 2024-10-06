<?php

use Application\core\Controller;

class Prova extends Controller 
{
    public function index()
    {
        $id = 1;
        $conn = $this->model('prova');
        $provas = $conn::GetProvas($id);
        $this->view('prova/index', ['provas' => $provas]);
    }

    public function formularioInicial()
    {
        $connMat = $this->model('materias');
        $materias = $connMat::GetMaterias("1");

        $connTurm = $this->model('turmas');
        $turmas = $connTurm::GetTurmas("1");

        $this->view('prova/formularioInicial', ['materias' => $materias, 'turmas' => $turmas]);
    }

    public function tipoQuestao($id = null)
    {
        $conn = $this->model('prova');
        if(is_null($id)){
            $materia = $_POST['materia'];
            $turma = $_POST['turma'];
            $data = $_POST['data'];
            $notaMax = $_POST['notaMax'];
            $notaMed = $_POST['notaMed'];
            $obs = $_POST['obs'];
    
            $insert = $conn::AddProva($materia, $turma, $data, $notaMax, $notaMed, $obs);
            //$insert = 2;
            if($insert > 0){

                $id = $conn::GetIdProva($materia, $turma, $data, $notaMax, $notaMed, $obs);
                $id = $id[0]['id_prova'];
                //$id = "1";
            } else {
                $msg = "<script>Houve um erro. Tente Novamente!</script>";
                echo $msg;
                $location = "window.location.href = '/prova/formularioInicial";
                echo $location;
            }
        } 
        $aux = $conn::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;
        $this->view('prova/tipoQuestao', ['id' => $id, 'num' => $num]);

    }

    public function personalizada($id)
    {
        $conn = $this->model('prova');
        $aux = $conn::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;
        $this->view('prova/personalizada', ['id' => $id, 'num' => $num]);
    }

    public function ia($id)
    {
        $conn = $this->model('prova');
        $aux = $conn::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;
        $this->view('prova/ia', ['id' => $id, 'num' => $num]);
    }

    public function descritiva($id)
    {
        $conn = $this->model('prova');
        $aux = $conn::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;
        $this->view('prova/descritiva', ['id' => $id, 'num' => $num]);
    }

    public function opcoes($id)
    {
        $this->view('prova/opcoes');
    }
}

?>