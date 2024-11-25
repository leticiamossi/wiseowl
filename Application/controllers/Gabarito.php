<?php

use Application\core\Controller;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Likelihood;


class Gabarito extends Controller
{
    public function inserir($idProva, $idAluno)
    {
        $this->verification();
        if($this->permission){
            $this->view("gabarito/inserir", ['prova' => $idProva, 'aluno' => $idAluno]);
        }
    }

    public function gabarito($idProva, $idAluno)
    {
        $this->verification();
        if($this->permission){
            putenv('GOOGLE_APPLICATION_CREDENTIALS='.$_SERVER['DOCUMENT_ROOT'].'/public/key/wiseowl-438417-aacbe0955e44.json');
    
            require $_SERVER['DOCUMENT_ROOT'].'/public/assets/composer/vendor/autoload.php';
    
            $client = new ImageAnnotatorClient();
            $imagePath = $_FILES['fileInput']['tmp_name'];
    
            $annotation = $client->annotateImage(
                fopen($imagePath, 'r'),
                [Type::TEXT_DETECTION]
            );
    
            $gabarito = [];
            foreach ($annotation->getTextAnnotations() as $textAnnotation) {
                array_push($gabarito, $textAnnotation);
            }
    
            $this->view('gabarito/processamento', ['gabarito' => $gabarito, 'prova' => $idProva, 'aluno' => $idAluno]);
        }
    }

    public function confirmacao($idProva, $idAluno){
        $this->verification();
        if($this->permission){
            $gabarito = $_POST['gabarito'];
    
            preg_match_all('/\[description\] => ([^\[]+)/', $gabarito, $matches);
            $descriptions = array_map('trim', $matches[1]);
    
            $connP = $this->model('prova'); 
            $numQuestoes = $connP::CountQuestoes($idProva);
            $numQuestoes = $numQuestoes[0]['num_questao'];
    
            $connA = $this->model('aluno');
            $aluno = $connA::GetAluno($idAluno);
    
            $respostas = [];
    
            for($i = 1; $i <= $numQuestoes; $i++){
                $key = array_search($i, $descriptions);
                $respostas[$i] = $descriptions[$key+1];
            }
    
            $questoes = $connP::GetQuestoes($idProva);
    
            $this->view('gabarito/confirmacao', ['respostas' => $respostas, 'prova' => $idProva, 'IDaluno' => $idAluno, 'aluno' => $aluno, 'questoes' => $questoes]);
        }
    }
}
