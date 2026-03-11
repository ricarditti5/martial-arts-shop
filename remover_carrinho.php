<?php 
session_start();

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    unset($_SESSION['carrinho'][$id]);
}

header("Location: ver_carrinho.php");
exit();
?>