<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseOwl | Login</title>
    <link rel="shortcut icon" href="../../../public/assets/img/Logo/Icon-verde.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:ital,wght@0,400..840;1,400..840&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Purple+Purse&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../public/assets/css/Header/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Padrao/style.css">
    <link rel="stylesheet" href="../../../public/assets/css/Prova/style.css">
</head>

<body>
    <main>
        <form action="/login/login" method="POST">
            <img src="../../public/assets/img/Logo/Logo.png" alt="" width="300px" style="margin: 0 auto; display: block">
            <div class="inp">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu e-mail" required>
            </div>
            
            <div class="inp">
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div>
            <input type="submit" value="Entrar" class="btn-form">
            <p style="text-align: center;">Novo(a) aqui? <a href="/cadastro/professor" style="color: #5B009B; text-decoration: underline;">Cadastre-se</a></p>
        </form>
    </main>
</body>

</html>