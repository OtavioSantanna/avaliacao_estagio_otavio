<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultar CEP</title>
  <link rel="stylesheet" href="../style/mainStyle.css">
</head>
<body>
<header>
  <h1>Consulta de CEP</h1>
  <div class="login-area">
    <?php
      session_start();

      if(isset($_SESSION['id_usuario'])){
        $id_usuario = $_SESSION['id_usuario'];
        $email = $_SESSION['email'];
        $nome = $_SESSION['nome'];
        echo("
          <p>Olá, $nome</p>
        ");
      }else{
        echo("
        <a href='login.html'><button class='btn-login'>Entrar</button></a>
        <a href='cadastrar.html'><button class='btn-login'>Criar conta</button></a>
        ");
      }
    ?>
  </div>
</header>
<main>
  <nav>
    <ul>
      <a href="mainPage.php"><li>Pesquisar CEP</li></a>
      <hr>
      <a href="cepSalvo.php"><li>CEPs salvos</li></a>
      <hr>
    </ul>
    <a class="sair" href="../actions/sair.php">
      <p>Sair</p>
      <ion-icon name="log-out-outline"></ion-icon>
    </a>
  </nav>
  <aside>
    <h2>Consultar CEP</h2>
    <div class="container">
      <div class="input-box">
        <input class="input-cep" type="text" id="cep" name="cep" maxlength="9" placeholder="Digite o CEP">
        <button class="btn-consultar" type="button" onclick="consultarCEP()">Consultar</button>
      </div>
    </div>
    <div class="info_cep" id="info_cep"></div>
    <div id="loading" style="display: none; font-size:1.3rem;">Carregando...</div>
  </aside>
</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../js/index.js"></script>
</body>
</html>
