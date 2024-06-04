<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escolasite";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO alunos (nome, telefone, email, cpf, data_nascimento, endereco, cidade, curso) VALUES ('$nome', '$telefone', '$email', '$cpf', '$data_nascimento', '$endereco', '$cidade', '$curso')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastro de aluno realizado com sucesso!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar aluno: " . $conn->error . "'); window.history.back();</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/icone.png">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Aluno</h2>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="telefone" placeholder="Telefone">
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="cpf" placeholder="CPF" required>
            <input type="date" name="data_nascimento" placeholder="Data de Nascimento" required>
            <input type="text" name="endereco" placeholder="Endereço">
            <input type="text" name="cidade" placeholder="Cidade">
            <input type="text" name="curso" placeholder="Curso">
            <button type="submit">Cadastrar</button>
        </form>
        <button onclick="location.href='dashboard.php'">Voltar</button>
    </div>
</body>
</html>
