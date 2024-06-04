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

$tipo = $_GET['tipo'];
$id = $_GET['id'];

if ($tipo == 'aluno') {
    $sql = "DELETE FROM alunos WHERE id='$id'";
} elseif ($tipo == 'professor') {
    $sql = "DELETE FROM professor WHERE id='$id'";
}

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Cadastro excluído com sucesso!'); window.location.href='lista_cadastros.php';</script>";
} else {
    echo "<script>alert('Erro ao excluir cadastro: " . $conn->error . "'); window.history.back();</script>";
}

$conn->close();
?>
