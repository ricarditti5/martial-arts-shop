<?php
include("conexao.php");
$result = $conn->query("SELECT * FROM tipos_artigos");

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: backend.php");
    exit();
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM artigo WHERE id_artigo = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$dadosAtuais = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo    = $_POST['artigo'];
    $preco     = $_POST['preco'];
    $stock     = $_POST['stock'];
    $categoria = $_POST['categoria'];
    
    //msm imagem da db
    $nomeFinal = $dadosAtuais['imagem']; 

    //verificar se o utilizador carregou uma imagem nova
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $nomeOriginal = $_FILES['imagem']['name'];
        $tmp          = $_FILES['imagem']['tmp_name'];
        
        // Nome original:
        $nomeFinal = str_replace(' ', '_', $nomeOriginal);
        $destino   = 'imagens/' . $nomeFinal;

        move_uploaded_file($tmp, $destino);
    }

    $stmt = $conn->prepare("UPDATE artigo SET artigo = ?, preco = ?, imagem = ?, stock = ?, categoria = ? WHERE id_artigo = ?");
    $stmt->bind_param("sdsisi", $artigo, $preco, $nomeFinal,$stock, $categoria, $id);

    if ($stmt->execute()) {
        header("Location: backend.php?editado=1");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4 bg-black text-white">
    <h2>Editar Artigo</h2>
    <form action="editar_artigo.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nome do Artigo</label>
            <input type="text" class="form-control" name="artigo" value="<?= $dadosAtuais['artigo'] ?>" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" value="<?= $dadosAtuais['preco'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem Atual:</label><br>
            <img src="imagens/<?= $dadosAtuais['imagem'] ?>" width="100" class="mb-2 img-thumbnail">
            <br>
            <label class="form-label">Substituir Imagem (Deixe vazio para manter a atual)</label>
            <input class="form-control" type="file" name="imagem" accept="image/*">
        </div>

        <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-control" name="categoria" id="categoria" required>
                <option class="text-secondary">Nenhuma Categoria</option>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                <option value=<?= htmlspecialchars($row['tipo_artigo']) ?>><?= htmlspecialchars($row['designacao']) ?></option>
                <?php endwhile; ?>             
        </select>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Selecione a Quantidade de stock que pretende. </label>
            <br>
            <input  class="form-control" type="number" name="stock">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Alterações</button>
        <a href="backend.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>