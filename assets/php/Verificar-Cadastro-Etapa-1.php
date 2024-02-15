<?php
    session_start();
    $nome_usuario = $_POST['user'];
    $data_nascimento = $_POST['nascimento'];

    VerificarNulos($nome_usuario, $data_nascimento);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "erro-nulo";
                header("Location: ../pages/cadastro-tela-1.php?$erro_campos_nulos");
                exit;
            }
        }
    }

    VerificarCaracteres($nome_usuario, $data_nascimento);
    function VerificarCaracteres($nome_usuario, $data_nascimento){
        if (preg_match('/^[a-zA-Z0-9_]+$/', $nome_usuario)){
            if(strlen($nome_usuario) < 32){
                $_SESSION['nome_usuario_cadastro'] = $nome_usuario;
                VerificarNome($nome_usuario, $data_nascimento);
            }else{
                $erro_numero_caracter = "erro-numero-caracter";
                header("Location: ../pages/cadastro-tela-1.php?$erro_numero_caracter");
            }
        }
        else {
            $erro_caracter = "erro-caracter";
            header("Location: ../pages/cadastro-tela-1.php?$erro_caracter");
        }
    }

    function VerificarNome($nome_usuario, $data_nascimento){
        $sql_code = "SELECT COUNT(nome_de_usuario) AS result FROM usuarios WHERE nome_de_usuario = '$nome_usuario'";
        include("conexao.php");
        $numero_de_usuarios = $mysqli->query($sql_code)->fetch_object()->result;
        if($numero_de_usuarios < 1){
            VerificarIdade($data_nascimento);
        }else{
            $erro_usuario = "erro-usuario-ja-existe";
            header("Location: ../pages/cadastro-tela-1.php?$erro_usuario");
        }
    }

    function VerificarIdade($data_nascimento){
        $ano_nascimento = explode('-', $data_nascimento)[0];
        $idade_usuario = date("Y") - $ano_nascimento;
        if($idade_usuario >= 18){
            $_SESSION['data_nascimento_cadastro'] = $data_nascimento;
            header("Location: ../pages/cadastro-tela-2.php");
            exit;
        }else{
            $erro_idade = "erro-idade";
            header("Location: ../pages/cadastro-tela-1.php?$erro_idade");   
        }
    }
?>