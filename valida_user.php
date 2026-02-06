<?php
session_start();
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "INSERT INTO users (user_name, user_email, user_pass) VALUES  (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome,$email, $senha);
$stmt->execute();
$resultado = $stmt->get_result();

if ($stmt->affected_rows > 0) {
    echo "User criado com sucesso";
    header("Location: login.php");
} else {
    $_SESSION['erro_registo'] = "Credenciais inválidas.";
    header("Location: criar_conta.php");
}
?>