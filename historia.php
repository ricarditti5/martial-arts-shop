<?php
include("conexao.php");
$result = $conn->query("SELECT * FROM artigo ORDER BY id_artigo DESC");
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
                  <a class="nav-link active" aria-current="page" href="historia.php">Historias das Artes Marciais</a>
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
                  <li class="nav-item">
                    <a class="nav-link" href="backend.php">User</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
  <h1>História das Artes Marciais: MMA e Kickboxe</h1>
  <div class="row">
    
  </div>
</body>
</html>