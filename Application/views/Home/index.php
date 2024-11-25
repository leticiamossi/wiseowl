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
    <link href="https://fonts.googleapis.com/css2?family=Purple+Purse&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../public/assets/css/Home/style.css">
</head>

<body>
    <main class="fundo-roxo-home">
        <div class="caixa-home">
            <h2 class="titulo-home">Olá, <?php echo $_SESSION['NOME'] ?>.</h2>
            <h3 class="subtitulo-home">O que deseja fazer hoje?</h3>
            <div class="navegador">
                <a href="/prova/formularioInicial">
                    <div class="cartao-nav">
                        <div class="icon-bk">
                            <svg class="icon-nav" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5"/>
                                <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635z"/>
                            </svg>
                        </div>
                        <div class="texto-nav">
                            <h5 class="titulo-nav">Montar prova</h5>
                            <p class="subtitulo-nav">Monte uma nova prova</p>
                        </div>
                    </div>
                </a>
                <a href="/prova/index">
                    <div class="cartao-nav">
                        <div class="icon-bk">
                            <svg class="icon-nav" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                            </svg>
                        </div>
                        <div class="texto-nav">
                            <h5 class="titulo-nav">Prova</h5>
                            <p class="subtitulo-nav">Veja suas montadas provas</p>
                        </div>
                    </div>
                </a>
                <a href="/aluno/index">
                    <div class="cartao-nav">
                        <div class="icon-bk">
                            <svg class="icon-nav" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917zM8 8.46 1.758 5.965 8 3.052l6.242 2.913z"/>
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46z"/>
                            </svg>
                        </div>
                        <div class="texto-nav">
                            <h5 class="titulo-nav">Alunos, Turma e Escola</h5>
                            <p class="subtitulo-nav">Monte suas turmas</p>
                        </div>
                    </div>
                </a>
                <a href="/prova/index">
                    <div class="cartao-nav">
                        <div class="icon-bk">
                            <svg class="icon-nav" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                            </svg>
                        </div>
                        <div class="texto-nav">
                            <h5 class="titulo-nav">Inserir Gabarito</h5>
                            <p class="subtitulo-nav">Selecione uma prova e adicione seus gabaritos.</p>
                        </div>
                    </div>
                </a>
                <a href="/relatorio/index">
                    <div class="cartao-nav">
                        <div class="icon-bk">
                            <svg class="icon-nav" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-file-bar-graph" viewBox="0 0 16 16">
                                <path d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5z"/>
                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                            </svg>
                        </div>
                        <div class="texto-nav">
                            <h5 class="titulo-nav">Relatório</h5>
                            <p class="subtitulo-nav">Analise os relatórios de suas provas</p>
                        </div>
                    </div>
                </a>
                <a href="https://drive.google.com/file/d/1NgTsqRkXQTvZgIzEODXcrTVtvol-YVUW/view?usp=sharing" target="_blank">
                    <div class="cartao-nav">
                        <div class="icon-bk">
                            <svg class="icon-nav" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94"/>
                            </svg>
                        </div>
                        <div class="texto-nav">
                            <h5 class="titulo-nav">Ajuda</h5>
                            <p class="subtitulo-nav">Acesse o manual do usuário</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <script src="../../public/assets/js/menu.js"></script>
</body>

</html>