<?php

use Application\core\Controller;

class Cadastro extends Controller
{
    public function professor()
    {
        $this->view('cadastro/professor');
    }
    
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
                $linhas = $_POST['linhas'];

                $conn = $this->model('questao');
                $insert = $conn::AddQuestaoDesc($enunciado, $arquivoNovo, $modeloResp, $tamanho, $linhas);
                if ($insert > 0) {
                    $idQ = $conn::GetIdQuestaoDesc($enunciado, $arquivoNovo, $modeloResp, $tamanho, $linhas);
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
                header("Location: /prova/detalhes/$id");
            }
        }
    }

    public function escola()
    {
        $nome = $_POST['nome'];
        //IMAGEM
        if (!empty($_FILES['fileInput'])) {
            $dir = "C:/xampp/htdocs/wiseowl/public/assets/img/logo-escola/";
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
        $id = 1;

        $conn = $this->model('escola');
        $insert = $conn::InsertEscola($nome, $arquivoNovo, $id);
        header("Location: /aluno/index");
    }

    public function turma()
    {
        $nome = $_POST['nome'];
        $escola = $_POST['escola'];
        $ano = date('Y');
        $id = 1;

        $conn = $this->model('turmas');
        $insert = $conn::InsertTurma($nome, $ano, $id, $escola);
        header("Location: /aluno/index");
    }

    public function aluno()
    {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $turma = $_POST['turma'];

        $conn = $this->model('aluno');
        $insert = $conn::InsertAluno($nome, $sobrenome, $turma);
        header("Location: /aluno/index");
    }

    public function gabarito($idProva, $idAluno)
    {
        $connP = $this->model('prova');
        $count = $connP::countQuestoes($idProva);
        $count = $count[0]['num_questao'];
        
        $respostas = [];
        for($i = 0; $i < $count; $i++) {
            $aux = "resp".$i;
            $resp = $_POST[$aux];
            switch($resp){
                case 'A': 
                    $resp = "respostaUm_questao";
                    break;
                case 'B': 
                    $resp = "respostaDois_questao";
                    break;
                case 'C': 
                    $resp = "respostaTres_questao";
                    break;
                case 'D': 
                    $resp = "respostaQuatro_questao";
                    break;
                case 'E': 
                    $resp = "respostaCinco_questao";
                    break;
            }
            $respostas[$i+1] = $resp;

        }
        
        $questoes = $connP::GetQuestoes($idProva);
        $connG = $this->model('gabarito');
        
        $cont = 1;
        foreach($questoes as $questao){
            $idQuestaoProva = $questao['id_questaoProva'];
            if($respostas[$cont] == $questao['respostaCerta_questao'] || $respostas[$cont] == "1"){
                $correcao = 1;
            } elseif($respostas[$cont] == "meio"){
                $correcao = 0.5;
            } else {
                $correcao = 0;
            }

            $insert = $connG::insertGabarito($idAluno, $idQuestaoProva, $respostas[$cont], $correcao);
            $cont++;
        }
        
        header("Location: /prova/detalhes/$idProva");
    }
}
