<?php
session_start();
include("conexao.php");

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if ($email === '' || $senha === '') {
    $_SESSION['erro'] = "Preencha email e password.";
    header("Location: login.php");
    exit();
}

// Procura o utilizador pelo email
$sql = "SELECT user_name, user_email, user_pass, type_user FROM users WHERE user_email = ? LIMIT 1";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    $_SESSION['erro'] = "Erro ao preparar o login.";
    header("Location: login.php");
    exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado && $resultado->num_rows === 1) {
    $user = $resultado->fetch_assoc();

    // Como o registo está a gravar a password em texto simples,
    // fazemos a comparação direta (aqui removemos espaços acidentais).
    if (trim($user['user_pass']) === $senha) {
        $_SESSION['logado'] = true;
        $_SESSION['nome']   = $user['user_name'];
        $_SESSION['email']  = $user['user_email'];
        $_SESSION['type_user'] = $user['type_user'];
        header("Location: backend.php");
        exit();
    } else {
        // Password não coincide
        $_SESSION['erro'] = "Password incorreta.";
        header("Location: login.php");
        exit();
    }
} else {
    // Email não encontrado
    $_SESSION['erro'] = "Email não encontrado.";
    header("Location: login.php");
    exit();
}
?>