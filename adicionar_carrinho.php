<?php
session_start();
include("conexao.php");

if (isset($_POST['id_produto'])) {

    //evitar valores null
    $user_id = intval($_SESSION['user_id'] ?? 0);
    $id_produto = intval($_POST['id_produto']);

    if ($user_id <= 0) {
        // Se não estiver logado, redireciona para login
        header("Location: login.php");
        exit();
    }

    // Se o carrinho ainda não existir
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Se o produto já estiver no carrinho
    if (isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto] += 1;
    } else {
        $_SESSION['carrinho'][$id_produto] = 1;
    }

    // Inserir ou atualizar na tabela carrinho
    $stmt = $conn->prepare("INSERT INTO carrinho (id_artigo, user_id, quantidade) VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE quantidade = quantidade + 1");
    if ($stmt) {
        $stmt->bind_param("ii", $id_produto, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: ver_carrinho.php");
    exit();
}