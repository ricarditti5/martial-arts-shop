<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

$carrinho = $_SESSION['carrinho'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Gestão de Artigos</title>
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
  <h1>O Meu Carrinho</h1>

<?php if (empty($carrinho)) : ?>
    <p>Carrinho vazio.</p>
<?php else : ?>


  <p>Bem-vindo, <?= $_SESSION['email'] ?>! <a href="logout.php" class="btn btn-danger btn-sm">Sair</a></p>
  
  <table class="table table-striped">
    <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Imagem</th>
        <th>Quantidade</th>
        <th>Subtotal</th>
        <th>Ações</th>
    </tr>
    
<?php
foreach ($carrinho as $id_produto => $quantidade) {

    $sql = "SELECT * FROM artigo WHERE id_artigo = ?";
   
   $stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_produto);
$stmt->execute();
$resultado = $stmt->get_result();
   
    
    $row = $resultado->fetch_assoc();

    $subtotal = $row['preco'] * $quantidade;
    $total += $subtotal;
?>
      <tr>
        <td><?= htmlspecialchars($row['artigo']) ?></td>
        <td>€<?= number_format($row['preco'], 2, ',', '.') ?></td>
        <td><img src="imagens/<?= htmlspecialchars($row['imagem']) ?>" width="60"></td>

        <td>
          <form method="post" action="atualizar_carrinho.php">
            <input type="hidden" name="id_produto" value="<?= $id_produto ?>">
            <input type="number" name="quantidade" value="<?= $quantidade ?>" min="1">
            <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
        </form>
        </td>
<td><?= number_format($subtotal, 2) ?> €</td>
    <td>
        <a class="btn btn-danger btn-sm" href="remover_carrinho.php?id=<?= $id_produto ?>">Remover</a>
    </td>

      </tr>
 <?php } ?>

<tr>
    <td colspan="4"><strong>Total</strong></td>
    <td colspan="2"><strong><?= number_format($total, 2) ?> €</strong></td>
</tr>

   

  </table>
  <?php endif; ?>
</body>
</html>