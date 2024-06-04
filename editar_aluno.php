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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $curso = $_POST['curso'];

    $sql = "UPDATE alunos SET nome='$nome', telefone='$telefone', email='$email', cpf='$cpf', data_nascimento='$data_nascimento', endereco='$endereco', cidade='$cidade', curso='$curso' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Dados do aluno atualizados com sucesso!'); window.location.href='lista_cadastros.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar aluno: " . $conn->error . "'); window.history.back();</script>";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM alunos WHERE id='$id'";
    $result = $conn->query($sql);
    $aluno = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/icone.png">
</head>
<body>
    <div class="container">
        <h2>Editar Aluno</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
            <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" placeholder="Nome" required>
            <input type="text" name="telefone" value="<?php echo $aluno['telefone']; ?>" placeholder="Telefone">
            <input type="email" name="email" value="<?php echo $aluno['email']; ?>" placeholder="Email" required>
            <input type="text" name="cpf" value="<?php echo $aluno['cpf']; ?>" placeholder="CPF" required>
            <input type="date" name="data_nascimento" value="<?php echo $aluno['data_nascimento']; ?>" placeholder="Data de Nascimento" required>
            <input type="text" name="endereco" value="<?php echo $aluno['endereco']; ?>" placeholder="Endereço">
            <input type="text" name="cidade" value="<?php echo $aluno['cidade']; ?>" placeholder="Cidade">
            <input type="text" name="curso" value="<?php echo $aluno['curso']; ?>" placeholder="Curso">
            <button type="submit">Atualizar</button>
        </form>
        <button onclick="location.href='lista_cadastros.php'">Voltar</button>
    </div>
</body>
</html>
