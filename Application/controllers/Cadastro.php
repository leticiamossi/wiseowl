<?php

use Application\core\Controller;

class Cadastro extends Controller
{
    public function extra($tipo, $id){
        $connP = $this->model('prova');
        $aux = $connP::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;

        $connMat = $this->model('materias');
        $assuntos = $connMat::GetAssuntos($id);
        $topicos = $connMat::GetTopicos($id);
        
        //IMAGEM
        if(!empty($_FILES['fileInput'])){
            $dir = "C:/xampp/htdocs/wiseowl/public/assets/img/questoes/";
            $arquivo = $_FILES['fileInput'];
            $data = str_replace("-", "", date('d-m-y'));

            $arquivoNovo = $dir.$data.$arquivo["name"];
            
            if(move_uploaded_file($arquivo["tmp_name"], $arquivoNovo)){
                $arquivoNovo = $data.$arquivo["name"];
            } else {
                $arquivoNovo = "";
                
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
            switch($correta){
                case 'a':
                    $correta = "respostaUm_questao";
                    break;
                case 'b':
                    $correta = "respostaDois_questao";
                    break;
                case 'c':
                    $correta = "respostaTres_questao";
                    break;
                case 'd':
                    $correta = "respostaQuartro_questao";
                    break;
                case 'e':
                    $correta = "respostaCinco_questao";
                    break;
            }

            $prof = "1";

            if($tipo == "personalizada"){
                $origem = "Escrita";
            } elseif ($tipo == "ia"){
                $origem = "Ia";
            }

            $conn = $this->model('questao');
            $insert = $conn::AddQuestao($enunciado, $arquivoNovo, $a, $b, $c, $d, $e, $correta, $tamanho, $prof, $origem);
            //$insert = 2;
            if($insert > 0){
                $idQ= $conn::GetIdQuestao($enunciado, $arquivoNovo, $a, $b, $c, $d, $e, $correta, $tamanho, $prof, $origem);
                //$idQ = 1;
                $this->view('prova/extras', ['id' => $id, 'num' => $num, 'idQ' => $idQ, 'assuntos' => $assuntos, 'topicos' => $topicos]);
            }
        }
    }

    public function questaoProva($id, $idQ, $end = null)
    {
        $assunto = $_POST['topico'];
        $dificuldade = $_POST['dificuldade'];
        $peso = $_POST['peso'];

        $connQ = $this->model('questao');
        $insert = $connQ::AddExtras($idQ, $assunto, $dificuldade);
        if($insert > 0){
            $connP = $this->model('prova');
            $insert2 = $connP::AddQuestaoObj($id, $idQ, $peso);
            if($insert2 > 0){
                if(is_null($end)){
                    header("Location: /prova/tipoQuestao/$id");
                } else {
                    header("Location: /home");
                }
            }
        }
    }
}

?>