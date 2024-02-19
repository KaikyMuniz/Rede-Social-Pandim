<?php
    session_start();
    $codigo_inserido = $_POST['codigo'];

    if($_SESSION['code_cadastro'] === $codigo_inserido) { 
        header("Location: Cadastrar-Usuario.php");
    } else {
        $erro_codigo = "erro-codigo";
        header("Location: ../pages/verificacao-email.php?$erro_codigo");
    }
?>