<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseOwl | Relatório</title>
    <link rel="shortcut icon" href="../../../public/assets/img/Logo/Icon-verde.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:ital,wght@0,400..840;1,400..840&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Purple+Purse&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../public/assets/css/Header/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Padrao/style.css">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body onload="filtrar();carregar()">
    <header>
        <img src="../../../public/assets/img/Logo/Logo-verde.png" alt="Logo WiseOwl" class="logo">
        <span id="icon-menu" onclick="abrirMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </span>
        <nav id="menu">
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
            <a href="/relatorio/index" class="item-nav  item-active">
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
            <a href="/prova/index" class="item-nav">
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
            <a href="/login/logout" class="item-nav">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Layer_1" height="512" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                </svg>
                <p>Sair</p>
            </a>
        </nav>
    </header>
    <main class="fundo-roxo">
        <div class="caixa">
            <h3 class="titulo-main">Filtros</h3>
            <div class="filtro-linha" style="margin-bottom: 50px;">
                <div class="inp">
                    <label for="data">Data</label>
                    <input type="month" name="data" id="data" onchange="filtrar()">
                </div>
                <div class="inp">
                    <label for="turma">Turma</label>
                    <select name="turma" id="turma" onchange="filtrar()">
                        <option value="" selected>Todos</option>
                        <?php foreach ($data['turmas'] as $turma) { ?>
                            <option value="<?php echo $turma['id_turma']; ?>"><?php echo $turma['nome_turma']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="inp">
                    <label for="materia">Matérias</label>
                    <select name="materia" id="materia" onchange="GetAssunto();filtrar()" required>
                        <option selected value="">Todas</option>
                    </select>
                </div>
                <div class="inp">
                    <label for="assunto">Assunto</label>
                    <select name="assunto" id="assunto" onchange="GetTopicos();filtrar()" required>
                        <option selected value="">Todos</option>
                    </select>
                </div>
                <div class="inp">
                    <label for="topico">Tópico Específico</label>
                    <select name="topico" id="topico" required onchange="filtrar()">
                        <option selected value="">Todos</option>
                    </select>
                </div>
                <script>
                    function filtrar() {
                        var json = JSON.parse('<?= json_encode($data['resultados']); ?>');
                        var data = document.getElementById('data').value;
                        var turma = document.getElementById('turma').value
                        var materia = document.getElementById('materia').value
                        var assunto = document.getElementById('assunto').value
                        var topico = document.getElementById('topico').value

                        if (data != '') {
                            json = json.filter(p => p.data_prova.substr(0, 7) == data)
                        }

                        if (turma !== "") {
                            json = json.filter(j => j.id_turma == turma)
                        }
                        if (materia !== "") {
                            json = json.filter(j => j.nome_materia == materia)
                        }
                        if (assunto !== "") {
                            json = json.filter(j => j.assunto_assunto == assunto)
                        }
                        if (topico !== "") {
                            json = json.filter(j => j.topico_assunto == topico)
                        }

                        atualizarRelatorioGeral(json);
                        montarListaProvas(json)
                    }

                    function carregar() {
                        const materias = [...new Set(JSON.parse('<?= json_encode($data['materias']); ?>').map(item => item.nome_materia))];
                        var materiaSelect = document.getElementById('materia')
                        materiaSelect.options.length = 1
                        materias.forEach(materia => {
                            materiaSelect.add(new Option(materia, materia))
                        })

                        var json = JSON.parse('<?= json_encode($data['resultados']); ?>');
                        montarRelatorioGeral(json)
                    }

                    function GetAssunto() {
                        var materiaEscolhida = document.getElementById('materia').value
                        var jsonAssuntos = JSON.parse('<?= json_encode($data['materias']); ?>').filter(m => m.nome_materia == materiaEscolhida);
                        const ass = [...new Set(jsonAssuntos.map(item => item.assunto_assunto))];

                        var assuntoSelect = document.getElementById('assunto')

                        assuntoSelect.options.length = 1

                        ass.forEach(assunto => {
                            assuntoSelect.add(new Option(assunto, assunto))
                        })
                    }

                    function GetTopicos() {
                        var assuntoEscolhido = document.getElementById('assunto').value
                        var jsonTopicos = JSON.parse('<?= json_encode($data['materias']); ?>').filter(m => m.assunto_assunto == assuntoEscolhido);
                        var topicoSelect = document.getElementById('topico')

                        topicoSelect.options.length = 1

                        jsonTopicos.forEach(topico => {
                            topicoSelect.add(new Option(topico.topico_assunto))
                        })
                    }
                </script>
            </div>

            <div style="width: 90%; margin: 20px auto">
                <div id="mp-assuntos" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center;">
                    <div id="melh-ass" style="min-width: 500px;"></div>
                    <div id="crit-ass" style="min-width: 500px;"></div>
                </div>
                <div id="media-turma"></div>
            </div>
            <h3 class="titulo-main">Provas</h3>
            <div id="mp-provas">
                <table class="table-main">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Matéria</th>
                            <th>Observações</th>
                            <th>Resultados</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="lista-provas">

                    </tbody>
                </table>
            </div>
            <script src="../../public/assets/js/relatorios/relatorioGeral.js"></script>
        </div>

    </main>
    <script src="../../public/assets/js/menu.js"></script>
</body>

</html>