<?php
    session_start();
    $sexo = $_POST['sexo'];

    VerificarNulos($sexo);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campo_nulo = "O campo não deve ser nulo";
                header("Location: ../pages/cadastro-tela-2.php?$erro_campo_nulo");
                exit;
            }
        }
    }
    $_SESSION['sexo_cadastro'] = $sexo;
    header("Location: ../pages/cadastro-tela-3.php");
    exit;
?>