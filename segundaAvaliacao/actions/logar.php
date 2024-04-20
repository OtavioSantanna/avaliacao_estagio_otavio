<?php
    include("conecta.php");
    session_start();

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $criptografia = md5($senha);

    $validar = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $validar->bindParam(1, $email);
    $validar->bindParam(2, $criptografia);
    
    $validar->execute();

    if($validar->rowCount() == 0){
        echo("
            <script>
                alert('E-mail ou senha incorretos');
                window.location = '../pages/login.html'
            </script>
        ");
    }else{
        $usuario_info = $validar->fetch(PDO::FETCH_ASSOC);
        $_SESSION["id_usuario"]=$usuario_info["id_usuario"];
        $_SESSION["nome"] = $usuario_info["nome"];
        $_SESSION["email"] = $email;
        header('Location: ../pages/mainPage.php');
    }
?>
