<?php

use Application\core\Controller;

class Login extends Controller 
{
    public function index()
    {
        $this->view('login/index');
    }

    public function login($email = null, $senha = null){
        if($email === null){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
        } 

        $conn = $this->model('professor');
        $professor = $conn::FindProfessor($email, $senha);

        if(!isset($_SESSION)) session_start();
        
        foreach($professor as $p){
            $_SESSION['ID'] = $p['id_professor'];
            $_SESSION['NOME'] = $p['nome_professor'];
        }

        echo '<script>window.location.href="/home/index"</script>';
    }

    public function logout(){
        session_destroy();
        echo '<script>window.location.href="/login"</script>';
    }
}

?>