<?php
    include("conecta.php");

    $id_usuario = $_POST["id_usuario"];
    $id_cep = $_POST["id_cep"];

    $sql=$pdo->prepare("DELETE FROM registro_de_cep WHERE id_usuario = ? AND id_cep = ?");
    $sql->bindParam(1, $id_usuario);
    $sql->bindParam(2, $id_cep);

    $executar=$sql->execute();

    header('Location: ../pages/cepSalvo.php');
?>