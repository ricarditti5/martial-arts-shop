<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

$nome  = $_SESSION['nome'] ?? 'Utilizador';
$email = $_SESSION['email'] ?? 'Não informado';
$tipo  = $_SESSION['type_user'] ?? 'user';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6">
            
            <div class="card">
                <div class="card-header">
                <h1 class="card-title mb-0">Perfil do Utilizador</h1>
                </div>
                
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-4 text-muted">Nome:</div>
                        <div class="col-8"><strong><?php echo htmlspecialchars($nome); ?></strong></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 text-muted">Email:</div>
                        <div class="col-8"><strong><?php echo htmlspecialchars($email); ?></strong></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 text-muted">Tipo de Utilizador:</div>
                        <div class="col-8">
                            <span class="badge <?php echo ($tipo === 'admin') ? 'bg-danger' : 'bg-secondary'; ?>">
                                <?php echo htmlspecialchars($tipo); ?>
                            </span>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <a href="backend.php" class="btn btn-secondary">Voltar</a>
                        <a href="mudar_perfil.php" class="btn btn-primary">Editar Informações</a>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="logout.php" class="btn btn-sm btn-link text-danger">Sair da conta</a>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>