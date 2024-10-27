<?php

use Application\core\Controller;

class Aluno extends Controller
{
    public function index()
    {
        $id = 1;
        $conn = $this->model('turmas');
        $turmas = $conn::GetTurmas($id);
        $this->view('aluno/index', ['turmas' => $turmas]);
    }

    public function criar()
    {
        $id = 1;
        $conn = $this->model('turmas');
        $turmas = $conn::GetTurmas($id);
        $this->view('aluno/criar', ['turmas' => $turmas]);
    }

    public function criarTurma()
    {
        $id = 1;
        $conn = $this->model('escola');
        $escolas = $conn::GetEscolas($id);
        $this->view('aluno/criarTurma', ['escolas' => $escolas]);
    }

    public function criarEscola()
    {
        $this->view('aluno/criarEscola');
    }
}

?>