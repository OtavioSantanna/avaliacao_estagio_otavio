<?php
    include("conecta.php");
    session_start();

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $criptografia = md5($senha);
    
    $prepare=$pdo->prepare("INSERT INTO usuarios (nome, email, senha) values(?,?,?);");
    $prepare->bindParam(1, $nome);
    $prepare->bindParam(2, $email);
    $prepare->bindParam(3, $criptografia);

    $executar = $prepare->execute();

    if($executar){
        $mensagem = "Cadastro foi concluído com sucesso!";
        $id_usuario = $pdo->lastInsertId();

        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;

        header('Location: ../pages/mainPage.php');
    }else{
        $mensagem = "Erro ao cadastrar usuario";
    }
?>