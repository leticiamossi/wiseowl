<?php

use Application\core\Controller;

class Prova extends Controller 
{
    public function index()
    {
        $this->verification();
        if($this->permission){
            $id = $_SESSION['ID'];
            $conn = $this->model('prova');
            $provas = $conn::GetProvas($id);
            $provasResultados = $conn::GetProvasResultados($id);

            $connT = $this->model('turmas');
            $turmas = $connT::GetTurmas($id);
            $this->view('prova/index', ['provas' => $provas, 'resultados' => $provasResultados, 'turmas' => $turmas]);
        }
    }

    public function formularioInicial()
    {
        $this->verification();
        if($this->permission){
            $id = $_SESSION['ID'];
            $connMat = $this->model('materias');
            $materias = $connMat::GetMaterias($id);
    
            $connTurm = $this->model('turmas');
            $turmas = $connTurm::GetTurmas($id);
    
            $this->view('prova/formularioInicial', ['materias' => $materias, 'turmas' => $turmas]);
        }
    }

    public function tipoQuestao($id = null)
    {
        $this->verification();
        if($this->permission){
            $conn = $this->model('prova');
            if(is_null($id)){
                $materia = $_POST['materia'];
                $turma = $_POST['turma'];
                $data = $_POST['data'];
                $notaMax = $_POST['notaMax'];
                $notaMed = $_POST['notaMed'];
                $obs = $_POST['obs'];
        
                $insert = $conn::AddProva($materia, $turma, $data, $notaMax, $notaMed, $obs);
                if($insert > 0){
    
                    $id = $conn::GetIdProva($materia, $turma, $data, $notaMax, $notaMed, $obs);
                    $id = $id[0]['id_prova'];
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
    }

    public function personalizada($id)
    {
        $this->verification();
        if($this->permission){
            $conn = $this->model('prova');
            $aux = $conn::CountQuestoes($id);
            $num = (int)$aux[0]['num_questao'] + 1;
            $this->view('prova/personalizada', ['id' => $id, 'num' => $num]);
        }
    }

    public function ia($id)
    {
        $this->verification();
        if($this->permission){
            $conn = $this->model('prova');
            $aux = $conn::CountQuestoes($id);
            $num = (int)$aux[0]['num_questao'] + 1;
            $this->view('prova/ia', ['id' => $id, 'num' => $num]);
        }
    }

    public function descritiva($id)
    {
        $this->verification();
        if($this->permission){
            $conn = $this->model('prova');
            $aux = $conn::CountQuestoes($id);
            $num = (int)$aux[0]['num_questao'] + 1;
            $this->view('prova/descritiva', ['id' => $id, 'num' => $num]);
        }
    }

    public function detalhes($id)
    {
        $this->verification();
        if($this->permission){
            $connA = $this->model('aluno');
            $alunos = $connA::GetAlunosProva($id);
    
            $connG = $this->model('gabarito');
            $resultados = $connG::getResultados($id);
    
            //1 = Certa
            //0.5 = Meio Ponto
            //0 = Errado
    
            $this->view('prova/detalhes', ['id' => $id, 'alunos' => $alunos, 'gabaritos' => $resultados]);
        }
    }

    public function questoes($id)
    {
        $this->verification();
        if($this->permission){
            $connP = $this->model('prova');
            $questoes = $connP::GetQuestoes($id);
            $this->view('prova/questoes', ['id' => $id, 'questoes' => $questoes]);
        }
    }

    public function anular($id, $idP)
    {
        $this->verification();
        if($this->permission){
            $connP = $this->model('prova');
            $update = $connP::AnularQuestao($idP);
    
            echo '<script>window.location.href="/prova/detalhes/'.$id.'"</script>';
        }
    }
}

?>