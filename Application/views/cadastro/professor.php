<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseOwl | Professor</title>
    <link rel="shortcut icon" href="../../../public/assets/img/Logo/Icon-verde.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:ital,wght@0,400..840;1,400..840&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../public/assets/css/Header/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Padrao/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Prova/style.css">
</head>

<body>
    <main>
        <form action="/professor/cadastro" method="POST" onsubmit="return verificarSenha()">
            <img src="../../public/assets/img/Logo/Logo.png" alt="" width="300px" style="margin: 0 auto; display: block">
            <div class="inp">
                <label for="nome">Nome*</label>
                <input type="text" name="nome" placeholder="Digite seu nome" required>
            </div>
            <div class="inp">
                <label for="sobrenome">Sobrenome*</label>
                <input type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
            </div>
            <div class="inp">
                <label for="email">E-mail*</label>
                <input type="text" name="email" placeholder="Digite seu e-mail" required>
            </div>
            
            <div class="inp">
                <label for="senha">Senha*</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="inp">
                <label for="senha-conf">Confirme sua senha*</label>
                <input type="password" name="senha-conf" id="senha-conf" placeholder="Digite sua senha" required>
            </div>
            <button class="btn-form">Cadastrar</button>
            
        </form>
    </main>
    <script>
        function verificarSenha(){
            var senha = document.getElementById('senha').value;
            var senhaConf = document.getElementById('senha-conf').value;
            
            if(senha !== senhaConf){
                document.getElementById('senha').style.border = "1px solid red";
                document.getElementById('senha-conf').style.border = "1px solid red";
                alert('As senhas devem ser iguais!')
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>