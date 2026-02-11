<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['type_user'] !== 'admin'){
  header("Refresh: 5, url=login.php "); 
  $tipoUsuario = $_SESSION['type_user'] ?? '';
  exit();
}
else if (isset($_SESSION['logado']) && $_SESSION['type_user'] !== 'admin') {
    header("Location: index.php");
    exit();
}

include("conexao.php");
$result = $conn->query("SELECT * FROM artigo ORDER BY id_artigo DESC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Gestão de Artigos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4 bg-black text-white">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Home</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="historia.php">Historias das Artes Marciais</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="luvas.php">Luvas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="caneleiras.php">Caneleiras</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="acessorios.php">Acessórios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="criar_conta.php">Criar Conta</a>
                  </li>
                  <?php 
                    // Verificamos diretamente na sessão se o tipo é admin
                    if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === 'admin') { 
                    ?>
                        <li class="nav-item">
                            <strong><a class="nav-link" href="backend.php">Configurações de Admin</a></strong>
                        </li>
                    <?php 
                    } // Aqui fecha o IF com uma chave, o que elimina o erro do 'endif'
                    ?>
                  <li class="nav-item">
                    <strong><a class="nav-link" href="perfil.php">Perfil</a></strong>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
  <h1>Gestão de Artigos</h1>
  <p>Bem-vindo, <?= $_SESSION['nome'] ?>! <a href="logout.php" class="btn btn-danger btn-sm">Sair</a></p>
  <a href="inserir_artigo.php" class="btn btn-success mb-3">Novo Artigo</a>
  <table class="table table-striped">
  <tr><th>Artigo</th><th>Preço</th><th>Imagem</th></tr>
    <?php while ($row = $result->fetch_assoc()) : ?>
      <tr>
        <td><?= htmlspecialchars($row['artigo']) ?></td>
        <td>€<?= number_format($row['preco'], 2, ',', '.') ?></td>
        <td><img src="imagens/<?= htmlspecialchars($row['imagem']) ?>" width="60"></td>
        <td <?= htmlspecialchars($row['stock'] )>= 1 ? "Disponivel" : "Indisponivel" ?>></td>
        <td class="pt-3">
        <a href="editar_artigo.php?id=<?= $row['id_artigo'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <a href="eliminar_artigo.php?id=<?= $row['id_artigo'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
        </td>
        
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>