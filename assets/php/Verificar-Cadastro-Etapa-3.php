<?php
    session_start();
    $descricao = $_POST['descricao'];

    VerificarNulos($descricao);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campo_nulo = "O campo não deve ser nulo";
                header("Location: ../pages/cadastro-tela-3.php?$erro_campo_nulo");
                exit;
            }
        }
    }
    $_SESSION['descricao_cadastro'] = $descricao;
    header("Location: ../pages/cadastro-tela-4.php");
    exit;
?>