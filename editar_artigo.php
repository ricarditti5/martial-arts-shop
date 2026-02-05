<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: backend.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $artigo = $_POST['artigo'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];

    $stmt = $conn->prepare("UPDATE artigos SET artigo=?, preco=?, imagem=? WHERE id_artigo=?");
    $stmt->bind_param("sdsi", $artigo, $preco, $imagem, $id);
    $stmt->execute();

    header("Location: backend.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM artigos WHERE id_artigo=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$artigo = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Editar Artigo</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Descrição</label>
            <input type="text" class="form-control" name="artigo" value="<?= $artigo['artigo'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" value="<?= $artigo['preco'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Imagem</label>
            <input type="text" class="form-control" name="imagem" value="<?= $artigo['imagem'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="backend.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
