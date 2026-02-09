<?php
session_start();
include("conexao.php");

$nome  = trim($_POST['nome']  ?? '');
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

// Registo simples (sem hash de password). Pode ser melhorado depois com password_hash.
$sql = "INSERT INTO users (user_name, user_email, user_pass) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    $_SESSION['erro'] = "Erro ao preparar o registo de utilizador.";
    header("Location: criar_conta.php");
    exit();
}

$stmt->bind_param("sss", $nome, $email, $senha);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    // Registo OK, redireciona para o login
    $_SESSION['erro'] = null;
    header("Location: login.php");
    exit();
} else {
    // Algo correu mal ao gravar o utilizador
    $_SESSION['erro'] = "Não foi possível criar a conta. Tente novamente.";
    header("Location: criar_conta.php");
    exit();
}
?>