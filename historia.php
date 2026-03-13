<?php
include("conexao.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Query para os artigos da base de dados (caso queiras listar posts dinâmicos em baixo)
$result = $conn->query("SELECT * FROM artigo ORDER BY id_artigo DESC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Martial Arts Shop | O Guia Definitivo do Combatente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="container mt-4 bg-black">
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
<header class="bg-white py-5 border-bottom shadow-sm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item active">História e Técnica</li>
                    </ol>
                </nav>
                <h1 class="display-3 fw-black mb-3">A ARTE DO IMPACTO</h1>
                <p class="lead text-secondary fs-4">Explore a evolução das artes marciais modernas: da tradição milenar à ciência do octógono.</p>
            </div>
        </div>
    </div>
</header>

<main class="container my-5">
    <div class="row g-5">
        
        <div class="col-lg-8 bg-white p-4 p-md-5 border rounded shadow-sm">
            
            <article>
                <p class="fs-5 lh-lg mb-5">
                    As artes marciais deixaram de ser apenas métodos de autodefesa para se tornarem nos desportos com maior crescimento no mundo. Nesta grande reportagem técnica, analisamos as duas modalidades que redefiniram o conceito de combate moderno: o <strong>MMA</strong> e o <strong>Kickboxing</strong>.
                </p>

                <section class="mb-5">
                    <h2 class="h1 fw-bold text-dark mb-4">MMA: A Ciência da Integração</h2>
                    <p class="text-secondary mb-4">
                        O Mixed Martial Arts (MMA) não é a "ausência de regras", mas sim a integração perfeita de várias disciplinas. Em Portugal, nomes como Pedro Carvalho e Manel Kape colocaram o país no mapa mundial, demonstrando que a técnica supera a força bruta.
                    </p>

                    

                    <h3 class="h4 fw-bold mt-5 mb-3">Os Três Pilares do Lutador Moderno</h3>
                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <div class="p-3 bg-light border-top border-danger border-4 rounded shadow-sm h-100">
                                <h5 class="fw-bold">Striking</h5>
                                <p class="small text-muted mb-0">Baseado no Muay Thai e Boxe. Foca-se no combate em pé utilizando os oito pontos de contacto.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light border-top border-danger border-4 rounded shadow-sm h-100">
                                <h5 class="fw-bold">Wrestling</h5>
                                <p class="small text-muted mb-0">A ponte entre o combate em pé e o solo. Essencial para ditar onde a luta ocorre.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light border-top border-danger border-4 rounded shadow-sm h-100">
                                <h5 class="fw-bold">Grappling</h5>
                                <p class="small text-muted mb-0">Domínio do Jiu-Jitsu Brasileiro (BJJ). A arte de finalizar o oponente através de alavancas e estrangulamentos.</p>
                            </div>
                        </div>
                    </div>

                    <h4 class="fw-bold mt-5 mb-3">A Importância do Equipamento de Proteção</h4>
                    <p>Treinar MMA sem a proteção adequada é o caminho mais rápido para uma lesão. As luvas de 4oz (competição) diferem drasticamente das luvas de 7oz (treino), desenhadas com enchimento extra para proteger as mãos durante o <em>sparring</em>.</p>
                </section>

                <hr class="my-5">

                <section class="mb-5">
                    <h2 class="h1 fw-bold text-dark mb-4">Kickboxing: A Arte da Precisão</h2>
                    <p class="text-secondary">Enquanto o MMA explora o solo, o Kickboxing é a refinação máxima do combate vertical. Existem diferentes estilos que todo o entusiasta deve conhecer:</p>

                    

                    <div class="accordion my-4 shadow-sm" id="kickboxingAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Estilo Holandês (Dutch Style)
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#kickboxingAccordion">
                                <div class="accordion-body">
                                    Famoso pela pressão constante e combinações de boxe que terminam invariavelmente com um pontapé na coxa (Low Kick). É o estilo mais temido nas competições europeias.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    K-1 Rules
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#kickboxingAccordion">
                                <div class="accordion-body">
                                    O formato japonês que revolucionou o mundo. Permite joelhadas e clinche limitado, promovendo nocaute rápidos e espetaculares.
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="h4 fw-bold mt-5 mb-3">A Evolução do K-1</h3>
                    <p>O K-1 World Grand Prix, iniciado nos anos 90, foi o primeiro grande palco onde lutadores de Karate, Muay Thai e Boxe se enfrentaram num conjunto de regras comum. Este legado continua vivo hoje através de organizações como o GLORY e o ONE Championship.</p>
                    
                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-bold text-danger">Resistência Cardiovascular</h5>
                                    <p class="small text-muted">No Kickboxing, o ritmo é frenético. Três assaltos de 3 minutos exigem um cardio de elite e uma recuperação explosiva.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-bold text-danger">Caneleiras: O Teu Escudo</h5>
                                    <p class="small text-muted">A canela é um dos ossos mais resistentes do corpo, mas sem proteção em treino, as microfraturas podem afastar-te do ginásio por meses.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>

        <div class="col-lg-4">
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0 fw-bold small text-uppercase">Tabela de Pesos UFC (Oficial)</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-borderless mb-0 small">
                        <tbody>
                            <tr class="border-bottom">
                                <td class="ps-3 py-2">Peso Galo</td>
                                <td class="text-end pe-3 fw-bold">61.2 kg</td>
                            </tr>
                            <tr class="border-bottom text-danger fw-bold">
                                <td class="ps-3 py-2">Peso Pena</td>
                                <td class="text-end pe-3">65.8 kg</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-3 py-2">Peso Leve</td>
                                <td class="text-end pe-3 fw-bold">70.3 kg</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-3 py-2">Peso Meio-Médio</td>
                                <td class="text-end pe-3 fw-bold">77.1 kg</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-3 py-2">Peso Médio</td>
                                <td class="text-end pe-3 fw-bold">83.9 kg</td>
                            </tr>
                            <tr>
                                <td class="ps-3 py-2">Peso Pesado</td>
                                <td class="text-end pe-3 fw-bold">120.2 kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card bg-danger border-0 text-white shadow p-3 mb-4">
                <div class="card-body text-center">
                    <i class="bi bi-box-seam display-4"></i>
                    <h4 class="fw-bold mt-3">Estás Pronto?</h4>
                    <p class="small mb-4 opacity-75">Temos as luvas e caneleiras ideais para quem está a começar no MMA ou Kickboxing.</p>
                    <a href="index.php" class="btn btn-light fw-bold w-100 py-2 rounded-pill">Ver Equipamento</a>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>