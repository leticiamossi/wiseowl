<?php

use Application\core\Controller;

class Aluno extends Controller
{
    public function index()
    {
        $this->view('aluno/index');
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
        $this->view('aluno/criarTurma');
    }
}

?>