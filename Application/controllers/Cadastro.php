<?php

use Application\core\Controller;

class Cadastro extends Controller
{
    public function extra($tipo, $id)
    {
        $connP = $this->model('prova');
        $aux = $connP::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;

        if ($tipo == "banco") {
            $idQ = $_POST['id'];

            $connQ = $this->model('questao');
            $questao = $connQ::GetQuestao($idQ);
            if (!empty($questao)) {
                $this->view('prova/extras', ['id' => $id, 'num' => $num, 'idQ' => $idQ, 'questao' => $questao]);
            }
        } else {

            $prof = "1";

            $connMat = $this->model('materias');
            $assuntos = $connMat::GetAssuntos($id);
            $topicos = $connMat::GetTopicos($id);

            //IMAGEM
            if (!empty($_FILES['fileInput'])) {
                $dir = "C:/xampp/htdocs/wiseowl/public/assets/img/questoes/";
                $arquivo = $_FILES['fileInput'];
                $data = str_replace("-", "", date('d-m-y'));

                $arquivoNovo = $dir . $data . $arquivo["name"];

                if (move_uploaded_file($arquivo["tmp_name"], $arquivoNovo)) {
                    $arquivoNovo = $data . $arquivo["name"];
                } else {
                    $arquivoNovo = "";
                }
            } else {
                $arquivoNovo = "";
            }

            $enunciado = $_POST['enunciado'];
            $enunciado = str_replace(PHP_EOL, '<br>', $enunciado);

            $tamanho = strlen(trim($enunciado));
            if ($tipo == "descritiva") {
                $modeloResp = $_POST['modeloResp'];

                $conn = $this->model('questao');
                $insert = $conn::AddQuestaoDesc($enunciado, $arquivoNovo, $modeloResp, $tamanho);

                if ($insert > 0) {
                    $idQ = $conn::GetIdQuestaoDesc($enunciado, $arquivoNovo, $modeloResp, $tamanho);
                    //$idQ = 1;
                    $idQ = $idQ[0]['id_questao'];
                    $this->view('prova/extras', ['id' => $id, 'num' => $num, 'idQ' => $idQ, 'assuntos' => $assuntos, 'topicos' => $topicos, 'tipo' => $tipo]);
                }
            } else {
                $a = $_POST['resp-a'];
                $b = $_POST['resp-b'];
                $c = $_POST['resp-c'];
                $d = $_POST['resp-d'];
                $e = $_POST['resp-e'];
                $correta = $_POST['correta'];
                switch ($correta) {
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

                if ($tipo == "personalizada") {
                    $origem = "Escrita";
                } elseif ($tipo == "ia") {
                    $origem = "Ia";
                }

                $conn = $this->model('questao');
                $insert = $conn::AddQuestao($enunciado, $arquivoNovo, $a, $b, $c, $d, $e, $correta, $tamanho, $prof, $origem);
                //$insert = 2;
                if ($insert > 0) {
                    $idQ = $conn::GetIdQuestao($enunciado, $arquivoNovo, $a, $b, $c, $d, $e, $correta, $tamanho, $prof, $origem);
                    //$idQ = 1;
                    $idQ = $idQ[0]['id_questao'];
                    $this->view('prova/extras', ['id' => $id, 'num' => $num, 'idQ' => $idQ, 'assuntos' => $assuntos, 'topicos' => $topicos]);
                }
            }
        }
    }

    public function questaoProva($id, $idQ, $end = null)
    {
        $tipo = $_POST['tipo'];
        if (isset($_POST['dificuldade']) && isset($_POST['topico'])) {
            $assunto = $_POST['topico'];
            $dificuldade = $_POST['dificuldade'];

            $connQ = $this->model('questao');
            if($tipo == "Obj"){
                $insert = $connQ::AddExtras($idQ, $assunto, $dificuldade);
            } else {
                $insert = $connQ::AddExtrasDesc($idQ, $assunto, $dificuldade);
            }
        }

        $peso = $_POST['peso'];

        $connP = $this->model('prova');
        if($tipo == "Obj"){
            $insert2 = $connP::AddQuestaoObj($id, $idQ, $peso);
        } else {
            $insert2 = $connP::AddQuestaoDesc($id, $idQ, $peso);
        }
        if ($insert2 > 0) {
            if (is_null($end)) {
                header("Location: /prova/tipoQuestao/$id");
            } else {
                header("Location: /home");
            }
        }
    }
}
