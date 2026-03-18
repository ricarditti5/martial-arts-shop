<?php
session_start();
include("conexao.php");

$nome  = trim($_POST['nome']  ?? '');
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');
$user_id = trim($_POST['user_id'] ?? '');
$tipoUsuario = $_SESSION['type_user'] ?? 'user';

$sql = "INSERT INTO users (user_name, user_email, user_pass, type_user) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    $_SESSION['erro'] = "Erro ao preparar o registo de utilizador.";
    header("Location: criar_conta.php");
    exit();
}

$stmt->bind_param("ssss", $nome, $email, $senha,$tipoUsuario);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    $_SESSION['erro'] = null;
    $_SESSION['logado'] = true;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['type_user'] = $tipoUsuario;
    header("Location: index.php");
    exit();
} else {
    $_SESSION['erro'] = "Não foi possível criar a conta. Tente novamente.";
    header("Location: criar_conta.php");
    exit();
}
?>