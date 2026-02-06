<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white">
          <div class="card-body p-5 text-center">
            <form action="valida_user.php" method="POST">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-4">Introduza o seu nome, email e palavra-passe</p>

              <div class="form-outline form-white mb-4">
                <input type="text" name="nome" class="form-control form-control-lg" required/>
                <label class="form-label">Nome</label>
              </div>


              <div class="form-outline form-white mb-4">
                <input type="email" name="email" class="form-control form-control-lg" required/>
                <label class="form-label">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="senha" class="form-control form-control-lg" required/>
                <label class="form-label">Password</label>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Criar Cadastro</button>
            </form>

            <?php if (isset($_SESSION['erro'])) {
              echo "<p class='mt-3 text-danger'>" . $_SESSION['erro'] . "</p>";
              unset($_SESSION['erro']);
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>