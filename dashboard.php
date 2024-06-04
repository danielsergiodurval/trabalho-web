<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/icone.png">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo $_SESSION['user_name']; ?></h1>
        <button onclick="location.href='cadastro_aluno.php'">Cadastrar Aluno</button>
        <button onclick="location.href='cadastro_professor.php'">Cadastrar Professor</button>
        <button onclick="location.href='lista_cadastros.php'">Lista de Cadastros</button>
    </div>
</body>
</html>
