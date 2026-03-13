<?php
session_start();
include("conexao.php");

if (isset($_POST['id_produto'])) {

    $id = intval($_POST['id_produto']);


    // Se o carrinho ainda não existir
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Se o produto já estiver no carrinho
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += 1;
    } else {
        $_SESSION['carrinho'][$id] = 1;
    }

    header("Location: ver_carrinho.php");
    exit();
}
$id = intval($_POST['id_produto']);
echo "<script type='text/javascript'>
        alert('$id');
        window.location.href = 'outra_pagina.php';
      </script>";
?>