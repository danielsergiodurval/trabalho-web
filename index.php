<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ou Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/icone.jpg">
    <script src="js/app.js" defer></script>
    
</head>
<body>
    <div class="container">
        <h1>Bem-vindo</h1>
        <div id="loginDiv">
            <h2>Login</h2>
            <form id="loginForm" method="POST" action="crud.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" name="action" value="login">Entrar</button>
            </form>
            <p>Ou</p>
            <button onclick="showRegister()">Cadastrar Usuário</button>
        </div>

        <div id="registerDiv" style="display:none;">
            <h2>Cadastro de Usuário</h2>
            <form id="registerForm" method="POST" action="crud.php">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" name="action" value="register">Cadastrar</button>
            </form>
            <button onclick="showLogin()">Voltar ao Login</button>
        </div>
    </div>
</body>
</html>
