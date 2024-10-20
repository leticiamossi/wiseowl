<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseOwl | Home</title>
    <link rel="shortcut icon" href="../../../public/assets/img/Logo/Icon-verde.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:ital,wght@0,400..840;1,400..840&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../public/assets/css/Header/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Padrao/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Prova/style.css">
</head>

<body onload="filtrar()">
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
            <a href="/prova/index" class="item-nav">
                <svg class="icon" id="Layer_1" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                    <path d="m21.414 5h-4.414v-4.414zm.586 2v17h-20v-21a3 3 0 0 1 3-3h10v7zm-15 9h7v-2h-7zm10 2h-10v2h10zm0-8h-10v2h10z" />
                </svg>
                <p>Prova</p>
            </a>
            <a href="/aluno/index" class="item-nav item-active">
                <svg class="icon" id="Layer_1" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                    <path d="m24 8.48v11.52a1 1 0 0 1 -2 0v-8.248l-7.4 3.536a5 5 0 0 1 -2.577.694 5.272 5.272 0 0 1 -2.7-.739l-7.38-3.513a3.691 3.691 0 0 1 -.084-6.455c.027-.016.056-.031.084-.045l7.457-3.558a5.226 5.226 0 0 1 5.282.045l7.375 3.513a3.767 3.767 0 0 1 1.943 3.25zm-11.978 9.5a7.26 7.26 0 0 1 -3.645-.972l-4.377-2.089v2.7a5.007 5.007 0 0 0 3.519 4.778 15.557 15.557 0 0 0 4.481.603 15.557 15.557 0 0 0 4.481-.607 5.007 5.007 0 0 0 3.519-4.778v-2.691l-4.459 2.13a6.983 6.983 0 0 1 -3.519.928z" />
                </svg>
                <p>Aluno</p>
            </a>
        </nav>
    </header>
    <main class="fundo-roxo">
        <div class="caixa">
            <a href="/aluno/criarEscola" class="btn-a">
                <div class="btn-main">
                    <div class="btn-icon">
                        <svg class="icon-roxo" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                        </svg>
                    </div>
                    <div class="btn-body">
                        <p>Criar Escola</p>
                    </div>
                </div>
            </a>
            <a href="/aluno/criarTurma" class="btn-a">
                <div class="btn-main">
                    <div class="btn-icon">
                        <svg class="icon-roxo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                        </svg>
                    </div>
                    <div class="btn-body">
                        <p>Criar Turma</p>
                    </div>
                </div>
            </a>
            <a href="/aluno/criar" class="btn-a">
                <div class="btn-main">
                    <div class="btn-icon">
                        <svg class="icon-roxo" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                    </div>
                    <div class="btn-body">
                        <p>Cadastrar Aluno</p>
                    </div>
                </div>
            </a>
            <div>
                <h3 class="titulo-main">Minhas Turmas</h3>
            </div>
        </div>
    </main>
    <script src="../../public/assets/js/menu.js"></script>
</body>

</html>