<?php
    session_start();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    VerificarNulos($email, $senha);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "erro-nulo";
                header("Location: ../pages/cadastro-tela-4.php?$erro_campos_nulos");
                exit;
            }
        }
    }

    VerificarCaracteres($email, $senha);
    function VerificarCaracteres($email, $senha){
        if(strlen($email) > 32){
            $erro_campos_tamanho = "erro-email-tamanho";
            header("Location: ../pages/cadastro-tela-4.php?$erro_campos_tamanho");
            exit;
        }else if(strlen($senha) < 8 || strlen($senha) > 16){
            $erro_campos_tamanho = "erro-senha-tamanho";
            header("Location: ../pages/cadastro-tela-4.php?$erro_campos_tamanho");
            exit;
        }
    }

    $_SESSION['email_cadastro'] = $email;
    $_SESSION['senha_cadastro'] = $senha;
    header("Location: ../pages/verificacao-email.php");
    exit;
?>