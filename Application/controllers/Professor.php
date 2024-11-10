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

        header("Location: /login/login/$email/$senha");

    }

}

?>