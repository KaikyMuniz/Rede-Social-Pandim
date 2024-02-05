<?php
    session_start();
    include("conexao.php");

    $imagem_perfil_upload = $_SESSION['imagem_perfil_cadastro'];
    $nome_usuario = $_SESSION['nome_usuario_cadastro'];
    $data_nascimento = $_SESSION['data_nascimento_cadastro'];
    $sexo = $_SESSION['sexo_cadastro'];
    $descricao = $_SESSION['descricao_cadastro'];
    $email = $_SESSION['email_cadastro'];
    $senha_hash = password_hash($_SESSION['senha_cadastro'], PASSWORD_DEFAULT);
    $seguidores = 0;
    $seguindo = 0;

    VerificarCadastro($mysqli, $nome_usuario, $data_nascimento, $sexo, 
    $descricao, $imagem_perfil_upload, $email, $senha_hash, $seguidores, $seguindo);

    function VerificarCadastro($mysqli, $nome_usuario, $data_nascimento, $sexo, 
    $descricao, $imagem_perfil_upload, $email, $senha_hash, $seguidores, $seguindo){
        $stmt = $mysqli->prepare
        ("INSERT INTO usuarios (nome_de_usuario, 
        data_de_nascimento, sexo, descricao, email, senha, seguidores, 
        seguindo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("ssssssii", $nome_usuario, $data_nascimento, $sexo, 
                $descricao, $email, $senha_hash, $seguidores, $seguindo);
        
        UploadImagem($nome_usuario, $stmt, $mysqli, $imagem_perfil_upload);
    }

    function UploadImagem($nome_usuario, $stmt, $mysqli, $imagem_perfil_upload){
        $stmt_upload_imagem = $mysqli->prepare("INSERT INTO imagem_perfil (nome_imagem,
        path, data_upload, nome_usuario) VALUES (?, ?, NOW(), ?)");

        $stmt_upload_imagem->bind_param("sss", $imagem_perfil_upload['nome_imagem'], 
                $imagem_perfil_upload['path'], $nome_usuario);

        RealizarCadastro($stmt, $stmt_upload_imagem, $imagem_perfil_upload, $mysqli);

    }
    function RealizarCadastro($stmt, $stmt_upload_imagem, $imagem_perfil_upload, $mysqli){
        if($stmt->execute() && $stmt_upload_imagem->execute()){
            unset($_SESSION['imagem_perfil_cadastro']);
            unset($_SESSION['nome_usuario_cadastro']);
            unset($_SESSION['data_nascimento_cadastro']);
            unset($_SESSION['sexo_cadastro']);
            unset($_SESSION['descricao_cadastro']);
            unset($_SESSION['email_cadastro']);
            unset($_SESSION['senha_cadastro']);
            header("Location: ../pages/login.php");
            exit;
        }else{
            echo "Erro ao inserir o cadastro ". $mysqli->error;
        }
        $stmt->close();
        $stmt_upload_imagem->close();
        $mysqli->close();
    }
?>