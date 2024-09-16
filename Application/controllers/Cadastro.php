<?php

use Application\core\Controller;

class Cadastro extends Controller
{
    public function extra($tipo, $idNum){
        $aux = explode('-',$idNum);
        $id = $aux[0];
        $num = $aux[1];
        
        //IMAGEM
        if(isset($_FILES['fileInput'])){
            $dir = "C:/xampp/htdocs/wiseowl/public/assets/img/questoes/";
            $arquivo = $_FILES['fileInput'];
            $data = str_replace("-", "", date('d-m-y'));

            $arquivoNovo = $dir.$data.$arquivo["name"];
            
            if(move_uploaded_file($arquivo["tmp_name"], $arquivoNovo)){
        
            } else {
                echo "Erro";
            }
        } else {
            $arquivoNovo = "";
        }

        $enunciado = $_POST['enunciado'];
        $tamanho = strlen(trim($enunciado));
        if($tipo == "descritiva"){

        } else {
            $a = $_POST['resp-a']; 
            $b = $_POST['resp-b']; 
            $c = $_POST['resp-c']; 
            $d = $_POST['resp-d'];
            $e = $_POST['resp-e'];
            $correta = $_POST['correta'];

            $prof = "1";

            if($tipo == "personalizada"){
                $origem = "Escrita";
            } elseif ($tipo == "ia"){
                $origem = "Ia";
            }

            $conn = $this->model('questao');
            $insert = $conn::AddQuestao($enunciado, $arquivoNovo, $a, $b, $c, $d, $e, $correta, $tamanho, $prof, $origem);

            if($insert > 0){
                $idQ= $conn::GetIdQuestao($enunciado, $arquivoNovo, $a, $b, $c, $d, $e, $correta, $tamanho, $prof, $origem);
                $this->view('prova/extras', ['id' => $id, 'num' => $num, 'idQ' => $idQ]);
            }
        }

        
    }
}

?>