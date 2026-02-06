<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$base_dados = "mas-db";

$conn = new mysqli($host, $usuario, $senha, $base_dados);
if ($conn->connect_error) {
    die("Erro na ligação: " . $conn->connect_error);
}
?>