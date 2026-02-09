<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$base_dados = "m11-mas";

$conn = new mysqli($host, $usuario, $senha, $base_dados);
if ($conn->connect_error) {
    die("Erro na ligação: " . $conn->connect_error);
}
?>