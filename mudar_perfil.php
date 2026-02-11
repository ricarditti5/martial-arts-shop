<?php
session_start();
include("conexao.php"); // Certifique-se que este ficheiro usa PDO ou ajuste para MySQLi

// 1. Verificação de Segurança (Só entra se estiver logado)
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

// Supondo que você guardou o ID do utilizador na sessão no momento do login:
$id_utilizador = $_SESSION['user_id'] ?? 0; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome']  ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    // 2. CORREÇÃO SQL: Faltava uma vírgula antes de 'senha'
    // IMPORTANTE: Em produção, use password_hash para a senha!
    $sql = "UPDATE users SET user_name = ?, user_email = ?, user_pass = ? WHERE id = ?";
    
    // Usando o objeto de conexão correto (ajuste se a sua variável for $conn ou $pdo)
    $stmt = $conn->prepare($sql); 
    
    if ($stmt->execute([$nome, $email, $senha, $id_utilizador])) {
        // Atualiza os nomes na sessão para refletir a mudança imediatamente
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        
        header('Location: perfil.php?ok=1');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4 bg-black text-white">
    <div class="card p-4 shadow">
        <h2>Editar Perfil</h2>
        
        <?php if (isset($_GET['ok'])): ?>
            <div class="alert alert-success">Perfil atualizado com sucesso!</div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($_SESSION['nome']); ?>" required/>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required/>
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Password</label>
                <input type="password" name="senha" class="form-control" placeholder="Digite a nova senha" required/>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Guardar Alterações</button>
                <a href="perfil.php" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>