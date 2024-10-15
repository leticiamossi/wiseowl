<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseOwl | questao</title>
    <link rel="shortcut icon" href="../../../public/assets/img/Logo/Icon-verde.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:ital,wght@0,400..840;1,400..840&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../public/assets/css/Header/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Padrao/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Home/style.css">
</head>

<body onload="filtrar()">
    <header>
        <img src="../../../public/assets/img/Logo/Logo-verde.png" alt="Logo WiseOwl" class="logo">
        <nav>
            <a href="/" class="item-nav">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512" class="icon">
                    <g>
                        <path d="M256,319.841c-35.346,0-64,28.654-64,64v128h128v-128C320,348.495,291.346,319.841,256,319.841z" />
                        <g>
                            <path d="M362.667,383.841v128H448c35.346,0,64-28.654,64-64V253.26c0.005-11.083-4.302-21.733-12.011-29.696l-181.29-195.99    c-31.988-34.61-85.976-36.735-120.586-4.747c-1.644,1.52-3.228,3.103-4.747,4.747L12.395,223.5    C4.453,231.496-0.003,242.31,0,253.58v194.261c0,35.346,28.654,64,64,64h85.333v-128c0.399-58.172,47.366-105.676,104.073-107.044    C312.01,275.383,362.22,323.696,362.667,383.841z" />
                            <path d="M256,319.841c-35.346,0-64,28.654-64,64v128h128v-128C320,348.495,291.346,319.841,256,319.841z" />
                        </g>
                    </g>
                </svg>
                <p>Home</p>
            </a>
            <a href="/relatorio/index" class="item-nav">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512">
                    <path d="M23,22H5a3,3,0,0,1-3-3V1A1,1,0,0,0,0,1V19a5.006,5.006,0,0,0,5,5H23a1,1,0,0,0,0-2Z" />
                    <path d="M6,20a1,1,0,0,0,1-1V12a1,1,0,0,0-2,0v7A1,1,0,0,0,6,20Z" />
                    <path d="M10,10v9a1,1,0,0,0,2,0V10a1,1,0,0,0-2,0Z" />
                    <path d="M15,13v6a1,1,0,0,0,2,0V13a1,1,0,0,0-2,0Z" />
                    <path d="M20,9V19a1,1,0,0,0,2,0V9a1,1,0,0,0-2,0Z" />
                    <path d="M6,9a1,1,0,0,0,.707-.293l3.586-3.586a1.025,1.025,0,0,1,1.414,0l2.172,2.172a3,3,0,0,0,4.242,0l5.586-5.586A1,1,0,0,0,22.293.293L16.707,5.878a1,1,0,0,1-1.414,0L13.121,3.707a3,3,0,0,0-4.242,0L5.293,7.293A1,1,0,0,0,6,9Z" />
                </svg>
                <p>Relatório</p>
            </a>
            <a href="/questao/index" class="item-nav item-active">
                <svg class="icon" id="Layer_1" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                    <path d="m21.414 5h-4.414v-4.414zm.586 2v17h-20v-21a3 3 0 0 1 3-3h10v7zm-15 9h7v-2h-7zm10 2h-10v2h10zm0-8h-10v2h10z" />
                </svg>
                <p>Prova</p>
            </a>
            <a href="/aluno/index" class="item-nav">
                <svg class="icon" id="Layer_1" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                    <path d="m24 8.48v11.52a1 1 0 0 1 -2 0v-8.248l-7.4 3.536a5 5 0 0 1 -2.577.694 5.272 5.272 0 0 1 -2.7-.739l-7.38-3.513a3.691 3.691 0 0 1 -.084-6.455c.027-.016.056-.031.084-.045l7.457-3.558a5.226 5.226 0 0 1 5.282.045l7.375 3.513a3.767 3.767 0 0 1 1.943 3.25zm-11.978 9.5a7.26 7.26 0 0 1 -3.645-.972l-4.377-2.089v2.7a5.007 5.007 0 0 0 3.519 4.778 15.557 15.557 0 0 0 4.481.603 15.557 15.557 0 0 0 4.481-.607 5.007 5.007 0 0 0 3.519-4.778v-2.691l-4.459 2.13a6.983 6.983 0 0 1 -3.519.928z" />
                </svg>
                <p>Aluno</p>
            </a>
        </nav>
    </header>
    <main class="fundo-roxo">
        <div class="caixa">
            <a href="/pdf/gerar/<?php echo $data['id'] ?>" class="btn-a">
                <div class="btn-main">
                    <div class="btn-icon">
                        <svg class="icon-roxo" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                        </svg>
                    </div>
                    <div class="btn-body">
                        <p>Gerar PDF</p>
                    </div>
                </div>
            </a>
            <a href="/pdf/gerarGabarito/<?php echo $data['id'] ?>" class="btn-a">
                <div class="btn-main">
                    <div class="btn-icon">
                        <svg class="icon-roxo" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                        </svg>
                    </div>
                    <div class="btn-body">
                        <p>Gerar PDF (gabarito)</p>
                    </div>
                </div>
            </a>
            <a href="/prova/questoes/<?php echo $data['id'] ?>" class="btn-a">
                <div class="btn-main">
                    <div class="btn-icon">
                        <svg class="icon-roxo" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                            <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635z" />
                        </svg>
                    </div>
                    <div class="btn-body">
                        <p>Questões</p>
                    </div>
                </div>
            </a>

            <h3 class="titulo-main">Visao Geral</h3>

            <h3 class="titulo-main">Alunos</h3>
            <section class="main-provas" id="provas">
                <table class="table-main">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Resultados</th>
                            <th>Nota</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="relatorio">

                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <script>
        function filtrar() {
            // var data = document.getElementById('data').value;
            // var status = document.getElementById('status').value;
            // var turma = document.getElementById('turma').value;

            var json = JSON.parse('<?= json_encode($data['alunos'], JSON_UNESCAPED_LINE_TERMINATORS) ?>');
            console.log(json)
            const cardAluno = document.querySelector('#relatorio');
            cardAluno.innerHTML = ''

            // if(data != '') {
            //     json = json.filter(p => p.data_prova.substr(0, 7) == data)
            // }
            // if (turma != "Todos") {
            //     json = json.filter(p => p.turma_prova == turma)
            // } 

            json.forEach((aluno, index) => {
                // Create a row for basic info
                let row = document.createElement("tr");
                row.id = `main-row-${index}`;
                row.classList.add("main-row");
                row.innerHTML = `
                <td>${aluno.nome_aluno}</td>
                <td></td>
                <td></td>
                <td><a href="/gabarito/inserir/${aluno.id_prova}/${aluno.id_aluno}" class="btn btn-row">Inserir Gabarito</a></td>
            `;

                // Add a click event to expand the row
                row.addEventListener("click", function() {
                    let detailsRow = document.getElementById(`details-${index}`);
                    let mainRow = document.getElementById(`main-row-${index}`);

                    detailsRow.classList.toggle("expanded");
                    mainRow.classList.toggle("row-active")

                });

                // Create a hidden row for details
                let detailsRow = document.createElement("tr");
                detailsRow.id = `details-${index}`;
                detailsRow.classList.add("details");
                detailsRow.innerHTML = `
                <td colspan="4">TESTE</canvas></td>
            `;

                // Append both rows to the table
                cardAluno.appendChild(row);
                cardAluno.appendChild(detailsRow);
            })

        }
    </script>
    <script>
        document.querySelectorAll('tr.expansivel').forEach(row => {
            row.addEventListener('click', () => {
                const nextRow = row.nextElementSibling;
                if (nextRow && nextRow.classList.contains('detalhes')) {
                    nextRow.style.display = nextRow.style.display === 'table-row' ? 'none' : 'table-row';
                }
            });
        });
    </script>
</body>

</html>