<?php

use Application\core\Controller;

class Relatorio extends Controller
{
    public function index()
    {
        $this->verification();
        if($this->permission){
            $id = $_SESSION['ID'];
            $connMat = $this->model('materias');
            $materias = $connMat::GetAllAssuntos($id);
    
            $connT = $this->model('turmas');
            $turmas = $connT::GetTurmas($id);
    
            $connG = $this->model('gabarito');
            $resultados = $connG::GetAllResultados($id);
    
            $this->view('relatorio/index', ['materias' => $materias, 'turmas' => $turmas, 'resultados' => $resultados]);
        }
    }

    public function prova($id)
    {
        $this->verification();
        if($this->permission){
            $connG = $this->model('gabarito');
            $resultados = $connG::getResultados($id);
    
            $this->view('relatorio/prova', ['resultados' => $resultados]);
        }
    }

    public function questao($id)
    {
        $this->verification();
        if($this->permission){
            $connG = $this->model('gabarito');
            $resultados = $connG::getResultadosQuestao($id);
            
            $this->view('relatorio/questao', ['resultados' => $resultados]);
        }
    }

    public function aluno($id)
    {
        $this->verification();
        if($this->permission){
            $idP = $_SESSION['ID'];
            $connMat = $this->model('materias');
            $materias = $connMat::GetAllAssuntos($idP);

            $connG = $this->model('gabarito');
            $resultados = $connG::getResultadosAluno($id);
            $resultadosTurma =  $connG::getResultadosTurmaAluno($id);
            
            $this->view('relatorio/aluno', ['resultados' => $resultados, 'materias' => $materias, 'turma' => $resultadosTurma]);
        }
    }
}
