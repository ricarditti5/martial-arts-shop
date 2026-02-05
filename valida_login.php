<?php
session_start();
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM users WHERE email = ? AND pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $_SESSION['logado'] = true;
    //$_SESSION['nome'] = $resultado->fetch_assoc()['nome'];
	$_SESSION['email'] = $resultado->fetch_assoc()['email'];
    header("Location: backend.php");
} else {
    $_SESSION['erro'] = "Credenciais inválidas.";
    header("Location: login.php");
}
?>