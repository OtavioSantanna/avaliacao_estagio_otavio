<?php
    include("conecta.php");

    $id_usuario = $_POST["id_usuario"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $bairro = $_POST["bairro"];
    $localidade = $_POST["localidade"];
    $uf = $_POST["uf"];
    $ibge = $_POST["ibge"];
    $ddd = $_POST["ddd"];
    $siafi = $_POST["siafi"];

    $sql=$pdo->prepare("INSERT INTO registro_de_cep (id_usuario, cep, logradouro, bairro, localidade, uf, ibge, ddd, siafi) values (?,?,?,?,?,?,?,?,?);");
    $sql->bindParam(1, $id_usuario);
    $sql->bindParam(2, $cep);
    $sql->bindParam(3, $logradouro);
    $sql->bindParam(4, $bairro);
    $sql->bindParam(5, $localidade);
    $sql->bindParam(6, $uf);
    $sql->bindParam(7, $ibge);
    $sql->bindParam(8, $ddd);
    $sql->bindParam(9, $siafi);

    $executar=$sql->execute();

    header('Location: ../pages/cepSalvo.php');
?>