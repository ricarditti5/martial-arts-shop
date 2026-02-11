<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $artigo    = $_POST['artigo'];
    $preco     = $_POST['preco'];
    $categoria = $_POST['categoria'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        
        $nomeFinal = $_FILES['imagem']['name']; // Nome original
        $nomeFinal = str_replace(' ', '_', $nomeFinal); // Limpar espaços
        $tmp       = $_FILES['imagem']['tmp_name'];
        $destino   = 'imagens/' . $nomeFinal; 

        // VERIFICAÇÃO: Se o ficheiro NÃO existe, fazemos o upload. 
        // Se já existe, apenas usamos o nome para a Base de Dados.
        if (!file_exists($destino)) {
            move_uploaded_file($tmp, $destino);
        }

        // Independentemente de ter feito upload agora ou não, 
        // guardamos o nome no banco de dados.
        $stmt = $conn->prepare("INSERT INTO artigo (artigo, preco, imagem, categoria) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdss", $artigo, $preco, $nomeFinal, $categoria);        
        if ($stmt->execute()) {
            header("Location: backend.php?sucesso=1");
            exit();
        } else {
            echo "Erro na DB: " . $conn->error;
        }
    }
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
    <form action="inserir_artigo.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="artigo" class="form-label">Nome do Artigo</label>
            <input type="text" class="form-control" name="artigo" id="artigo" required>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" id="preco" required>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Selecione a Imagem que pretende(png,jpg,jpeg)</label>
            <br>
            <input  class="form-control" type="file" name="imagem" accept="image/*" required>
        </div>
        <div class="mb-3">
        
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-control" name="categoria" id="categoria" required>
            <option value="Luvas">Luvas</option>
                <option value="Caneleiras">Caneleiras</option>
                <option value="Roupas">Roupas</option>
                <option value="Proteção">Proteção Facial/Bucal</option>
                <option value="Acessórios">Acessórios</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Inserir</button>
        <a href="backend.php" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>