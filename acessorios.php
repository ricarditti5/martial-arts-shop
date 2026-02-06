<?php
include("conexao.php");
$result = $conn->query("SELECT * FROM artigos ORDER BY id_artigos DESC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Artigos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Home</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Historias das Artes Marciais</a>
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
                    <a class="nav-link" href="backend.php">User</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
  <h1>Artigos Disponíveis</h1>
  <div class="row">
    <?php while ($row = $result->fetch_assoc()) : ?>
      <div class="col-md-4">
        <div class="card mb-3">
          <img src="imagens/<?= htmlspecialchars($row['imagem']) ?>" class="card-img-top" alt="Imagem">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['artigos']) ?></h5>
            <p class="card-text"><strong>Preço:</strong> €<?= number_format($row['preco'], 2, ',', '.') ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>