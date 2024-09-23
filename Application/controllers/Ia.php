<?php

use Application\core\Controller;

class Ia extends Controller
{
    public function gerar($id)
    {
        $conn = $this->model('prova');
        $aux = $conn::CountQuestoes($id);
        $num = (int)$aux[0]['num_questao'] + 1;

        $assunto = $_POST['assunto'];
        $tamanho = $_POST['tamanho'];
        switch ($tamanho) {
            case 'curta':
                $tamanho = 'até 250 caracteres';
                break;
            case 'media':
                $tamanho = '250 a 500 caracteres';
                break;
            case 'longa':
                $tamanho = 'mais de 500 caracteres';
                break;
        }
        $dificuldade = $_POST['dificuldade'];


        $prompt = "gere um json (enunciado: {}, opcoes: {a: {}, b:{}, c:{}, d:{}, e:{}}m correta:{})de uma questão objetiva $dificuldade com 5 opções de resposta sobre $assunto com o enunciado contendo de $tamanho (sem contar as respostas)  ";

        $data = [
            'contents' => [
                [
                    "parts" =>  [
                                    "text" => $prompt
                                ]
                ]
            ]
        ];

        $GOOGLE_API_KEY = "AIzaSyBqGX94uyncpPogXyOy10V4AVycFBC8Ng4";
        $ch = curl_init("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$GOOGLE_API_KEY");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($response);
        foreach($json->candidates as $aux){
            foreach($aux->content->parts as $i){

                $jsonResponse = $i->text;
                $jsonResponse = str_replace("```", "", $jsonResponse);
                $jsonResponse = str_replace("json", "", $jsonResponse);
                $jsonQuestao = json_decode($jsonResponse);

                $enunciado = $jsonQuestao->enunciado;
                $a = $jsonQuestao->opcoes->a;
                $b =  $jsonQuestao->opcoes->b;
                $c = $jsonQuestao->opcoes->c;
                $d = $jsonQuestao->opcoes->d;
                $e = $jsonQuestao->opcoes->e;
                $correta = $jsonQuestao->correta;
            }
        }
        $this->view('ia/gerar', ['enunciado' => $enunciado, 'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'correta' => $correta, 'id' => $id, 'num' => $num]);
    }
}
