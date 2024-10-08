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
            border: 1px solid black;
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
                            <img src="/public/assets/img/logo/logo-fundobranco.jpeg" width="150px">
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

            <div style="font-size: .9em;">
                <h3 style="text-align: center;">Instruções para Preenchimento do Gabarito da Prova</h3>
                <p style="text-align: center;"><strong>ATENÇÃO: É OBRIGATÓRIO PREENCHER O GABARITO COM LETRA CAIXA ALTA.</strong></p>
                <ul>
                    <li><strong>Utilize Caneta Azul ou Preta:</strong> Use uma caneta com tinta escura para garantir que suas respostas sejam legíveis.</li>
                    <li><strong>Preencha a Letra da Resposta:</strong> Ao marcar sua resposta, escreva <strong>apenas a letra correspondente</strong> (A, B, C, D ou E) em caixa alta. Por exemplo:
                        <ul>
                            <li>Se a resposta for A, escreva <strong>A</strong>.</li>
                            <li>Se a resposta for C, escreva <strong>C</strong>.</li>
                        </ul>
                    </li>
                    <li><strong>Marque Apenas Uma Opção:</strong> Para cada questão, escolha apenas uma alternativa. Se você marcar mais de uma, a resposta será considerada inválida.</li>
                    <li><strong>Evite Raspagens:</strong> Caso precise corrigir uma resposta, risque a letra anterior e escreva a nova letra ao lado, mas mantenha a legibilidade.</li>
                    <li><strong>Revise Antes de Entregar:</strong> Verifique suas respostas antes de entregar o gabarito para assegurar que todas estão corretas e legíveis.</li>
                    <li><strong>Não Escreva em Outros Locais:</strong> Preencha somente os espaços designados para as respostas. Não escreva em outras partes do gabarito.</li>
                </ul>
            </div>
            <div class="gabarito" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; row-gap: 10px;">
                <?php
                $cont = 1;
                foreach ($data['questoes'] as $questao) {
                ?>
                    <div style="display: flex; flex-direction: column;">
                        <div class="questao">
                            <?php
                            echo "<th>" . $cont . "</th>";
                            $cont++;
                            ?>
                        </div>
                        <div class="resposta">
                            <p></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <?php
            $cont = 1;
            foreach ($data['questoes'] as $questao) {
                if ($questao['questao_questao'] != null) {
                    echo "<p>" . $cont . ") " . $questao['questao_questao'] . "</p>";
                    if ($questao['imagem_questao'] != null) {
                        echo "<img src='../../public/assets/img/questoes/" . $questao['imagem_questao'] . "' width='500px'/>";
                    }
                    echo "<p>" . "a) " . $questao['respostaUm_questao'] . "</p>";
                    echo "<p>" . "b) " . $questao['respostaDois_questao'] . "</p>";
                    echo "<p>" . "c) " . $questao['respostaTres_questao'] . "</p>";
                    echo "<p>" . "d) " . $questao['respostaQuatro_questao'] . "</p>";
                    echo "<p>" . "e) " . $questao['respostaCinco_questao'] . "</p>";
                    echo "<br><br>";
                } else {
                    echo "<p>" . $cont . ") " . $questao['questao_questaoDesc'] . "</p>";
                    if ($questao['imagem_questaoDesc'] != null) {
                        echo "<img src='../../public/assets/img/questoes/" . $questao['imagem_questaoDesc'] . "' width='500px'/>";
                    }
                    echo "<p>____________________________________________________________________________________</p>";
                    echo "<p>____________________________________________________________________________________</p>";
                    echo "<p>____________________________________________________________________________________</p>";
                    echo "<p>____________________________________________________________________________________</p>";
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
                    filename: 'prova.pdf',
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

                html2pdf().from(element).set(opt).save().then(() => {
                    window.location.href = "/prova";
                });
            }
        </script>
        <script src="html2pdf.bundle.min.js"></script>
</body>

</html>