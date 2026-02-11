<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$host = "localhost";
$usuario = "root";
$senha = "";
$base_dados = "m11-mas";

$conn = new mysqli($host, $usuario, $senha, $base_dados);
    if ($conn->connect_error) {
        die("Erro na ligação: " . $conn->connect_error);
    }
$logado=$_SESSION['logado'] ?? false;
$nomeUsuario=$_SESSION['nome'] ?? '';
$tipoUsuario=$_SESSION['type_user'] ?? 'user';

   /* if ($tipoUsuario !== 'admin') {
        header("Location: index.php");
        exit();
    }*/
?>