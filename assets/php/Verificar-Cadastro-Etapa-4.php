<?php
    session_start();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    VerificarNulos($email, $senha);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "Os campos não devem ser nulo";
                header("Location: ../pages/cadastro-tela-4.php?$erro_campos_nulos");
                exit;
            }
        }
    }

    $_SESSION['email_cadastro'] = $email;
    $_SESSION['senha_cadastro'] = $senha;
    header("Location: Cadastrar-Usuario.php");
    exit;
?>