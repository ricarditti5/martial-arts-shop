<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $artigo = $_POST['artigo'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];

    $stmt = $conn->prepare("INSERT INTO artigos (artigo, preco, imagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $artigo, $preco, $imagem);
    $stmt->execute();

    header("Location: backend.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Inserir Artigo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Inserir Novo Artigo</h2>
    <form action="inserir_artigo.php" method="POST">
        <div class="mb-3">
            <label for="artigo" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="artigo" id="artigo" required>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" id="preco" required>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Nome do ficheiro da imagem</label>
            <input type="text" class="form-control" name="imagem" id="imagem" required>
        </div>
        <button type="submit" class="btn btn-success">Inserir</button>
        <a href="backend.php" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>