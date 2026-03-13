<?php
include("conexao.php");

if (!isset($_SESSION['ultima_compra'])) {
    header("Location: index.php");
    exit();
}

$compra = $_SESSION['ultima_compra'];
unset($_SESSION['ultima_compra']);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Realizada - Martial Arts Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand text-danger" href="index.php">Home</a>
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
                  <li class="nav-item">
                    <a class="nav-link" href="ver_carrinho.php">Carrinho</a>
                  </li>
                  <?php 
                    // Verificamos diretamente na sessão se o tipo é admin
                    if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === 'admin') { 
                    ?>
                        <li class="nav-item">
                            <strong><a class="nav-link" href="backend.php">Configurações de Admin</a></strong>
                        </li>
                    <?php 
                    } // Aqui fechamos o IF com uma chave, o que elimina o erro do 'endif'
                    ?>
                  <li class="nav-item">
                    <strong><a class="nav-link" href="perfil.php">Perfil</a></strong>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card confirmation-card">
                <div class="card-body p-5 text-center">

                    <div class="success-icon mb-3">✅</div>
                    <h1 class="fw-bold mb-1">Compra Realizada!</h1>
                    <p class="text-muted mb-4">Obrigado pela sua compra. O seu pedido foi registado com sucesso.</p>
                    <p class="text-muted"><small>Data: <?= htmlspecialchars($compra['data']) ?></small></p>

                    <hr>

                    <h5 class="text-start mb-3">Resumo do Pedido</h5>
                    <table class="table table-hover text-start">
                        <thead class="table-dark">
                            <tr>
                                <th>Produto</th>
                                <th class="text-center">Qtd.</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($compra['itens'] as $item): ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['nome']) ?></td>
                                    <td class="text-center"><?= $item['quantidade'] ?></td>
                                    <td class="text-end">€<?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="total-row">
                                <td colspan="2" class="text-end">Total:</td>
                                <td class="text-end">€<?= number_format($compra['total'], 2, ',', '.') ?></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="mt-4">
                        <a href="index.php" class="btn btn-voltar btn-lg px-5">Continuar a Comprar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
