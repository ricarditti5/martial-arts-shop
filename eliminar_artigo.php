<?php
include("conexao.php");

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}
/*if($_SESSION['type_user']!== "admin"){
    echo "Acesso Negado";
    exit();
} */
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM artigo WHERE id_artigo = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: backend.php");
exit();
?>
