<?php
session_start();

// Proteção: Se não houver sessão, manda para o login
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

// Pegamos os dados da sessão (garanta que o login preenche estes campos)
$nome  = $_SESSION['nome'] ?? 'Utilizador';
$email = $_SESSION['email'] ?? 'Não informado';
$tipo  = $_SESSION['type_user'] ?? 'user';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                    <div class="rounded-circle bg-white text-primary d-inline-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px; font-size: 2rem; font-weight: bold;">
                        <?php echo strtoupper(substr($nome, 0, 1)); ?>
                    </div>
                    <h4 class="mb-0"><?php echo htmlspecialchars($nome); ?></h4>
                    <span class="badge <?php echo ($tipo === 'admin') ? 'bg-danger' : 'bg-dark'; ?> mt-2">
                        <i class="bi bi-shield-check"></i> <?php echo ucfirst($tipo); ?>
                    </span>
                </div>
                
                <div class="card-body p-4">
                    <h5 class="text-muted mb-4">Informações Pessoais</h5>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 text-primary fs-4">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div class="ms-3">
                            <p class="mb-0 text-muted small">Nome</p>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($nome); ?></p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 text-primary fs-4">
                            <i class="bi bi-envelope-at"></i>
                        </div>
                        <div class="ms-3">
                            <p class="mb-0 text-muted small">Endereço de E-mail</p>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($email); ?></p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-grid gap-2">
                        <a href="perfil.php" class="btn btn-primary rounded-pill">
                            <i class="bi bi-pencil-square"></i> Editar Perfil
                        </a>
                        <a href="backend.php" class="btn btn-outline-secondary rounded-pill">
                            <i class="bi bi-arrow-left"></i> Voltar ao Painel
                        </a>
                    </div>
                </div>
                
                <div class="card-footer text-center bg-white border-0 pb-4">
                    <a href="logout.php" class="text-danger text-decoration-none small fw-bold">
                        <i class="bi bi-box-arrow-right"></i> Terminar Sessão
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>