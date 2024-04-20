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
    <h2>CEPs Salvos</h2>
    <div class="container">
      <div class="input-box">
        <input class="input-search" type="text" id="searchInput" name="searchInput" placeholder="Procurar">
        <select id="pesquisar">
          <option value="0" id="cidade">Sem filtro</option>
          <option value="1" id="cidade">Cidade</option>
          <option value="2" id="estado">UF</option>
          <option value="3" id="rua">Rua</option>
        </select>
        <button class="btn-consultar" onclick="Pesquisar();" type="button">Procurar</button>
      </div>
    </div>
    <?php
      include("../actions/conecta.php");
      if(isset($_SESSION['id_usuario'])){
        $id_usuario = $_SESSION['id_usuario'];
        $email = $_SESSION['email'];
        $nome = $_SESSION['nome'];

        echo("<h2>CEPs Salvos: </h2>"); 
        echo("
          <table>
          <thead>
              <th>CEP</th>
              <th>Logradouro</th>
              <th>Bairro</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>IBGE</th>
              <th>DDD</th>
              <th>siafi</th>
              <th>Ações</th>
          </thead>
        ");
        
        if(isset($_GET['op'])){
          if(($_GET['op'] != 0)){
            $op = $_GET['op'];
            $txt = $_GET['txt'];

            if($op == 1){
              $comando = $pdo->prepare("SELECT * FROM registro_de_cep WHERE localidade = ? AND id_usuario = ?");
              $comando->execute([$txt, $id_usuario]);
            }
            if($op == 2){
              $comando = $pdo->prepare("SELECT * FROM registro_de_cep WHERE uf = ? AND id_usuario = ?");
              $comando->execute([$txt, $id_usuario]);
            }
            if($op == 3){
              $comando = $pdo->prepare("SELECT * FROM registro_de_cep WHERE logradouro = ? AND id_usuario = ?");
              $comando->execute([$txt, $id_usuario]);
            }
          }else{
            $comando = $pdo->prepare("SELECT * FROM registro_de_cep WHERE id_usuario = $id_usuario");
          }

        }else{
          $comando = $pdo->prepare("SELECT * FROM registro_de_cep WHERE id_usuario = $id_usuario");
        }
        $resultado = $comando->execute();
        if($resultado){
          echo("<tbody>"); // Abre a tag tbody aqui
          while ($linhas = $comando->fetch()){
              $id_cep = $linhas["id_cep"];
              $cep = $linhas["cep"];
              $logradouro = $linhas["logradouro"];
              $bairro = $linhas["bairro"];
              $localidade = $linhas["localidade"];
              $uf = $linhas["uf"];
              $ibge = $linhas["ibge"];
              $ddd = $linhas["ddd"];
              $siafi = $linhas["siafi"];
      
              echo("
                  <tr> <!-- Abre a tag tr aqui -->
                      <td>$cep</td>
                      <td>$logradouro</td>
                      <td>$bairro</td>
                      <td>$localidade</td>
                      <td>$uf</td>
                      <td>$ibge</td>
                      <td>$ddd</td>
                      <td>$siafi</td>
                      <td>
                        <form action='../actions/excluir_cep.php' method='POST'>
                          <input type='hidden' name='id_cep' value='$id_cep'>
                          <input type='hidden' name='id_usuario' value='$id_usuario'>
                          <button class='btn-excluir' type='submit'><ion-icon name='trash-outline'></ion-icon></button>
                        </form>
                      </td>
                  </tr>
              ");
          }
          echo("</tbody>");
        }
      }else{
          echo("
            <p>Faça Login ou cadastre-se para armazenar CEPs</p>
          ");
        }
    ?>
  </aside>
</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../js/index.js"></script>
<script>
  function Pesquisar(){
    var txt = searchInput.value;
    var op = pesquisar.value;

    window.open("cepSalvo.php?txt="+ txt +"&op="+ op,"_self")
  }
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
