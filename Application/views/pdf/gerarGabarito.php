<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .tabela {
            margin: 0;
            width: auto;
        }

        table,
        table th,
        table td {
            border: 1px solid #AAAAAA;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .tabela__cabecalho h5 {
            margin: 0 5px;
        }

        .tabela__cabecalho p {
            margin: 5px;
        }

        .tabela__cabecalho td {
            padding: 15px 5px;
        }

        .gabarito {
            margin-top: 30px;

        }

        .questao,
        .resposta {
            border: 1px solid #000;
            padding: 10px 20px;
        }

        .lista {
            max-height: 500px;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            list-style: none;
        }

        .lista li p {
            border: 1px solid #000000;
            border-collapse: collapse;
            margin: 0;
            height: auto;
        }

        @media print {

            /* Ajustes de impressão */
            body {
                margin: 0;
            }

            #prova {
                page-break-after: avoid;
                /* Evitar quebra de página após o conteúdo */
            }
        }
    </style>
</head>

<body onload="gerar()">
    <div id="prova" style="padding: 25px 50px;">

        <div class="tabela">
            <table class="tabela__cabecalho">
                <tbody>
                    <tr>
                        <td rowspan="3" width="150px">
                            <img src="../../public/assets/img/logo-escola/<?php if(isset($data['prova'][0]['logo_escola'])){ echo $data['prova'][0]['logo_escola']; }else{ echo 'Logo-verde.png'; }?>" style="max-height: 100px; max-width: 150px; display: block; margin: 0 auto;">
                        </td>
                        <td colspan="4" style="position: relative;">
                            <h5 style="top: 0; position: absolute;">Aluno</h5>
                            <p></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="position: relative;">
                            <h5 style="top: 0; position: absolute;">Professor</h5>
                            <p></p>
                        </td>
                        <td class="coluna-menor" rowspan="2" style="position: relative; width: 100px;">
                            <h5 style="top: 0; position: absolute;">Nota</h5>
                            <p></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="coluna-menor" style="position: relative;">
                            <h5 style="top: 0; position: absolute;">Data</h5>
                            <p></p>
                        </td>
                        <td style="position: relative;">
                            <h5 style="top: 0; position: absolute;">Matéria</h5>
                            <p></p>
                        </td>
                        <td class="coluna-menor" style="position: relative;">
                            <h5 style="top: 0; position: absolute;">Turma</h5>
                            <p></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="font-size: .8em;">
                <h3 style="text-align: center;">Instruções para Preenchimento do Gabarito da Prova</h3>
                <p style="text-align: center;"><strong>ATENÇÃO: É OBRIGATÓRIO PREENCHER O GABARITO COM LETRA CAIXA ALTA.</strong></p>
                <ul>
                    <li><strong>Utilize Caneta Azul ou Preta:</strong> Use uma caneta com tinta escura para garantir que suas respostas sejam legíveis.</li>
                    <li><strong>Preencha a Letra da Resposta:</strong> Ao marcar sua resposta, escreva <strong>apenas a UMA letra correspondente</strong> (A, B, C, D ou E) em caixa alta. Por exemplo:
                        <ul>
                            <li>Se a resposta for A, escreva <strong>A</strong>.</li>
                            <li>Se a resposta for C, escreva <strong>C</strong>.</li>
                        </ul>
                    </li>
                    <li><strong>Preencha o gabarito com calma e atenção: </strong> Garantindo que suas respostas estejam corretas antes de marcar definitivamente</li>
                    <li><strong>Evite Rasura: Qualquer rasura pode prejudicar a leitura eletrônica de sua prova.</strong> </li>
                    <li><strong>Revise Antes de Entregar:</strong> Verifique suas respostas antes de entregar o gabarito para assegurar que todas estão corretas e legíveis.</li>
                    <li><strong>Não Escreva em Outros Locais:</strong> Preencha somente os espaços designados para as respostas. Não escreva em outras partes do gabarito.</li>
                </ul>
            </div>
           
            <table style="text-align: center; width: 150px; margin: 10px auto;">
                <tr>
                    <th>Questao</th>
                    <th>Alternativa</th>
                </tr>
                <?php 
                $cont = 1;
                foreach($data['questoes'] as $questao) { 
                    if($questao['questao_questao'] != null)
                    {
                        $aux = $questao['respostaCerta_questao'];
                        switch($aux){
                            case 'respostaUm_questao':
                                $td = "A";
                                break;
                            case 'respostaDois_questao':
                                $td = "B";
                                break;
                            case 'respostaTres_questao':
                                $td = "C";
                                break;
                            case 'respostaQuatro_questao':
                                $td = "D";
                                break;
                            case 'respostaCinco_questao':
                                $td = "E";
                                break;
                        }
                    } else {
                        $td = "Desc";
                    }
                ?>
                
                <tr>
                    <td style="padding: 10px;"><b><?php printf("%02d", $cont)?></b></td>
                    <td style="padding: 10px;"><?php echo $td; ?></td>
                </tr>
                <?php $cont++; } ?>
            </table>

            <?php
            $cont = 1;
            foreach ($data['questoes'] as $questao) {
                if ($questao['questao_questao'] != null) {
                    $num = $questao['id_questao'];
                    echo "<p>" . $cont . ") " . $questao['questao_questao'] . "</p>";
                    if ($questao['imagem_questao'] != null) {
                        echo "<img src='../../public/assets/img/questoes/" . $questao['imagem_questao'] . "' width='500px'/>";
                    }
                    echo "<p id='respostaUm_questao$num'>" . "a) " . $questao['respostaUm_questao'] . "</p>";
                    echo "<p id='respostaDois_questao$num'>" . "b) " . $questao['respostaDois_questao'] . "</p>";
                    echo "<p id='respostaTres_questao$num'>" . "c) " . $questao['respostaTres_questao'] . "</p>";
                    echo "<p id='respostaQuatro_questao$num'>" . "d) " . $questao['respostaQuatro_questao'] . "</p>";
                    echo "<p id='respostaCinco_questao$num'>" . "e) " . $questao['respostaCinco_questao'] . "</p>";
                    $certa = $questao['respostaCerta_questao'];
                    echo "<style>#$certa$num { font-weight: bold}</style>";
                    echo "<br><br>";
                } else {
                    echo "<p>" . $cont . ") " . $questao['questao_questaoDesc'] . "</p>";
                    if ($questao['imagem_questaoDesc'] != null) {
                        echo "<img src='../../public/assets/img/questoes/" . $questao['imagem_questaoDesc'] . "' width='500px'/>";
                    }

                    echo "<br>";
                    echo "R.: ".$questao['modeloResp_questaoDesc'];
                    echo "<br><br>";
                }
                $cont++;
            }
            ?>
        </div>
        <script>
            function gerar() {

                var element = document.getElementById('prova');
                var opt = {
                    filename: 'prova-GABARITO.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 1
                    },
                    margin: 0.5,
                    html2canvas: {
                        dpi: 192,
                        scale: 2,
                        letterRendering: true,
                        useCORS: true
                    },
                    jsPDF: {
                        unit: 'cm',
                        format: 'letter',
                        orientation: 'portrait'
                    },
                    pagebreak: {
                        mode: 'avoid-all'
                    }
                };

                let url = window.location.href;
                let parts = url.split('/');

                html2pdf().from(element).set(opt).save().then(() => {
                    window.location.href = '/prova/detalhes/' + parts[parts.length - 1];
                });
            }
        </script>
        <script src="html2pdf.bundle.min.js"></script>
</body>

</html>