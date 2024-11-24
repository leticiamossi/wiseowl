<?php

use Application\core\Controller;

class Professor extends Controller 
{
    public function cadastro()
    {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conn = $this->model('professor');
        $insert = $conn::InsertProfessor($nome, $sobrenome, $email, $senha);

        echo '<script>window.location.href="/login/login/'.$email.'/'.$senha.'"</script>';

    }

    public function disciplina()
    {
        $conn = $this->model('materias');
        $materias = $conn::GetAllMaterias();

        $this->view('cadastro/disciplina' , ['materias' => $materias]);
    }
}

?>