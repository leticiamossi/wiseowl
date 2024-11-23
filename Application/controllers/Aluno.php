<?php

use Application\core\Controller;

class Aluno extends Controller
{
    public function index()
    {
        $this->verification();
        if($this->permission){
            $id = $_SESSION['ID'];
            $conn = $this->model('turmas');
            $turmas = $conn::GetTurmas($id);
            $this->view('aluno/index', ['turmas' => $turmas]);
        }
    }

    public function criar()
    {
        $this->verification();
        if($this->permission){
            $id = $_SESSION['ID'];
            $conn = $this->model('turmas');
            $turmas = $conn::GetTurmas($id);
            $this->view('aluno/criar', ['turmas' => $turmas]);
        }
    }

    public function criarTurma()
    {
        $this->verification();
        if($this->permission){
            $id = $_SESSION['ID'];
            $conn = $this->model('escola');
            $escolas = $conn::GetEscolas($id);
            $this->view('aluno/criarTurma', ['escolas' => $escolas]);
        }
    }

    public function criarEscola()
    {
        $this->verification();
        if($this->permission){
            $this->view('aluno/criarEscola');
        }
    }
}

?>