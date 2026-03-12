<?php
session_start();

if (isset($_POST['id_produto'], $_POST['quantidade'])) {

    $id = intval($_POST['id_produto']);
    $quantidade = intval($_POST['quantidade']);

    if ($quantidade > 0) {
        $_SESSION['carrinho'][$id] = $quantidade;
    }

    header("Location: ver_carrinho.php");
    exit();
}
?>