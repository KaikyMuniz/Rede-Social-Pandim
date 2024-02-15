<?php
    include("conexao.php");
    include("Protecao-Cadastro.php");

    function VerificarCadastro($mysqli, $nome_usuario, $data_nascimento, $sexo, 
    $descricao, $email, $senha_hash, $seguidores, $seguindo){
        $stmt = $mysqli->prepare
        ("INSERT INTO usuarios (nome_de_usuario, 
        data_de_nascimento, sexo, descricao, email, senha, seguidores, 
        seguindo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("ssssssii", $nome_usuario, $data_nascimento, $sexo, 
        $descricao, $email, $senha_hash, $seguidores, $seguindo);
        
        RealizarCadastro($stmt, $mysqli);
    }

    function RealizarCadastro($stmt, $mysqli){
        if($stmt->execute()){
            unset($_SESSION['data_nascimento_cadastro']);
            unset($_SESSION['sexo_cadastro']);
            unset($_SESSION['descricao_cadastro']);
            unset($_SESSION['email_cadastro']);
            unset($_SESSION['senha_cadastro']);
            header("Location: ../pages/escolher-imagem-perfil.php");
            exit;
        }else{
            echo "Erro ao inserir o cadastro ". $mysqli->error;
        }
        $stmt->close();
        $mysqli->close();
    }
?>