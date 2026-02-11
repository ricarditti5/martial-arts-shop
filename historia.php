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
<header class="article-header">
    <div class="container">
        
        <h1 class="display-2 mb-0">A Arte do Impacto</h1>
        <span class="badge-combat">Documentário Técnico</span>
        <p class="lead">Do Pancrácio Grego ao Octógono Moderno: A evolução definitiva do combate.</p>
    </div>
</header>

<main class="container my-5">
    <div class="row g-5">
        
        <div class="col-lg-8">
            
            <section id="mma" class="mb-5">
                <h2 class="h1 mb-4 text-dark border-bottom border-3 pb-2">MMA: Mixed Martial Arts</h2>
                <p class="lead">O MMA é frequentemente confundido apenas com "vale-tudo", mas hoje é uma das modalidades desportivas mais regulamentadas do mundo.</p>
                
                <div class="card info-card shadow-sm p-4">
                    <h5>A Ciência das Disciplinas</h5>
                    <p>Um lutador moderno de MMA não "conhece" várias artes; ele <b>integra</b> o combate. A transição entre o soco e a queda (takedown) é onde se ganham as lutas hoje em dia.</p>
                    <div class="row text-center mt-3">
                        <div class="col-4 border-end"><strong>Striking</strong><br><small>Muay Thai / Boxe</small></div>
                        <div class="col-4 border-end"><strong>Clinch</strong><br><small>Wrestling / Judo</small></div>
                        <div class="col-4"><strong>Ground</strong><br><small>BJJ / Luta Livre</small></div>
                    </div>
                </div>

                <h4 class="mt-4">As Regras Unificadas</h4>
                <p>O sucesso global do MMA (através do UFC e PFL) deve-se às Regras Unificadas. Algumas proibições essenciais:</p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="rule-box">
                            <h6>Golpes Proibidos</h6>
                            <ul class="small">
                                <li>Dedo no olho ou puxar cabelo.</li>
                                <li>Golpes na nuca ou coluna vertebral.</li>
                                <li>Chutes ou joelhadas na cabeça de oponente caído.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rule-box">
                            <h6>Formas de Vitória</h6>
                            <ul class="small">
                                <li><strong>KO:</strong> Nocaute inconsciente.</li>
                                <li><strong>Submissão:</strong> Desistência (Tap out).</li>
                                <li><strong>TKO:</strong> Interrupção médica ou do árbitro.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            

            <section id="kickboxing" class="mb-5 py-4 border-top">
                <h2 class="h1 mb-4">Kickboxing & K-1 Style</h2>
                <p>Enquanto o MMA foca na versatilidade, o Kickboxing é a pureza do combate em pé. Existem várias escolas, mas a mais famosa é o <b>K-1 (Regras Japonesas)</b>.</p>
                
                <div class="timeline-line ps-4 border-start border-danger border-3 ms-2">
                    <div class="mb-4">
                        <h5 class="fw-bold">Kickboxing Americano (Anos 70)</h5>
                        <p class="small text-muted">Apenas golpes acima da cintura e calças compridas. Focado no Karate e Boxe.</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-bold">Muay Thai vs Japão (Anos 80-90)</h5>
                        <p class="small text-muted">A introdução dos "Low Kicks" (pontapés nas pernas) que mudaram o jogo para sempre.</p>
                    </div>
                    <div>
                        <h5 class="fw-bold">A Era de Ouro do K-1 (2000+)</h5>
                        <p class="small text-muted">Lutadores como Ernesto Hoost e Remy Bonjasky tornaram o desporto um fenómeno global de massas.</p>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-4">
            <div class="sidebar-sticky">
                
                <div class="card bg-dark text-white mb-4 border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title text-danger fw-bold border-bottom border-secondary pb-2">DIVISÕES DE PESO (UFC)</h5>
                        <table class="table table-dark table-sm table-borderless small mt-3">
                            <tr><td>Flyweight</td><td class="text-end">56.7 kg</td></tr>
                            <tr><td>Featherweight</td><td class="text-end">65.8 kg</td></tr>
                            <tr><td>Lightweight</td><td class="text-end">70.3 kg</td></tr>
                            <tr><td>Welterweight</td><td class="text-end">77.1 kg</td></tr>
                            <tr><td>Middleweight</td><td class="text-end">83.9 kg</td></tr>
                            <tr><td>Light Heavyweight</td><td class="text-end">93.0 kg</td></tr>
                            <tr><td>Heavyweight</td><td class="text-end">120.2 kg</td></tr>
                        </table>
                    </div>
                </div>

                <div class="card p-4 text-center border-0 shadow-sm" style="background-color: #fce4e4;">
                    <i class="bi bi-shield-shaded display-4 text-danger mb-3"></i>
                    <h6>Preparado para o Combate?</h6>
                    <p class="small text-muted">A proteção certa evita lesões e melhora a tua performance no treino.</p>
                    <a href="index.php" class="btn btn-danger w-100 fw-bold">VER EQUIPAMENTO</a>
                </div>

            </div>
        </div>
    </div>
</main>
  </div>
</body>
</html>