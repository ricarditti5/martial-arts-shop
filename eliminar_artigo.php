<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM artigo WHERE id_artigo=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: backend.php");
exit();
?>
