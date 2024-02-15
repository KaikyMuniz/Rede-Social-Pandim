<?php
    include("conexao.php");
    session_start();
    if(empty($_SESSION['nome_usuario_cadastro']) || empty($_FILES['escolher-imagem-input'])){
        header("Location: Protecao-Cadastro");
    }
    $nome_usuario = $_SESSION['nome_usuario_cadastro'];
    $imagem_perfil = $_FILES['escolher-imagem-input'];
    UploadImagem($mysqli, $nome_usuario, $imagem_perfil);

    function UploadImagem($mysqli,  $nome_usuario, $imagem_perfil){
        if($imagem_perfil['error']){
            $erro_imagem = "erro-arquivo";
            header("Location: ../pages/escolher-imagem-perfil.php?$erro_imagem");
            exit;
        }
        if($imagem_perfil['size'] > 4194304){
            $erro_tamanho_imagem = "erro-tamanho-arquivo";
            header("Location: ../pages/escolher-imagem-perfil.php?$erro_tamanho_imagem");
            exit;
        }else{
            $pasta_perfil = "../image/perfil/";
            $nome_imagem = $imagem_perfil['name'];
            $novo_nome_imagem = uniqid(); // criptografar o nome
            $extensao = strtolower(pathinfo($nome_imagem, PATHINFO_EXTENSION)); // path = caminho, dedutivo o resto
            if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg"){
                $erro_formato_imagem = "erro-formato-imagem";
                header("Location: ../pages/escolher-imagem-perfil.php?$erro_formato_imagem");
                exit;
            }else{
                $path = $pasta_perfil . $novo_nome_imagem . "." . $extensao;
                $salvar_imagem = move_uploaded_file($imagem_perfil['tmp_name'], $path);
                if($salvar_imagem){
                    $dados_upload_imagem = array(
                        'nome_imagem' => $nome_imagem,
                        'path' => $path,
                        'salvar_imagem' => $salvar_imagem,
                    );
                    
                    $stmt_upload_imagem = $mysqli->prepare("INSERT INTO imagem_perfil (nome_imagem,
                    path, data_upload, nome_usuario) VALUES (?, ?, NOW(), ?)");
            
                    $stmt_upload_imagem->bind_param("sss", $dados_upload_imagem['nome_imagem'], 
                    $dados_upload_imagem['path'], $nome_usuario);

                    if($stmt_upload_imagem->execute()){
                        unset($_SESSION['nome_usuario_cadastro']);
                        header("Location: ../pages/login.php");
                        exit;
                    }else{
                        echo "Erro ao inserir a imagem ". $mysqli->error;
                    }
                }else{
                    $erro_imagem = "erro-arquivo";
                    header("Location: ../pages/escolher-imagem-perfil.php?$erro_imagem");
                }
                $stmt_upload_imagem->close();
                $mysqli->close();
            }
        }
    }
?>