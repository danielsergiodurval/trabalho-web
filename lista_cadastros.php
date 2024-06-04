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

$alunos_sql = "SELECT * FROM alunos";
$professores_sql = "SELECT * FROM professor";

$alunos_result = $conn->query($alunos_sql);
$professores_result = $conn->query($professores_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cadastros</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/icone.png">
</head>
<body>
    <div class="container">
        <h2>Alunos</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
            <?php while($row = $alunos_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['cpf']; ?></td>
                <td>
                    <a href="editar_aluno.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="excluir.php?tipo=aluno&id=<?php echo $row['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h2>Professores</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
            <?php while($row = $professores_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['cpf']; ?></td>
                <td>
                    <a href="editar_professor.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="excluir.php?tipo=professor&id=<?php echo $row['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        
        <button onclick="location.href='dashboard.php'">Voltar</button>
    </div>
</body>
</html>
