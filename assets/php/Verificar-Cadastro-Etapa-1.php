<?php
    session_start();
    $imagem_perfil = $_FILES['escolher-imagem-input'];
    $nome_usuario = $_POST['user'];
    $data_nascimento = $_POST['nascimento'];

    VerificarNulos($imagem_perfil, $nome_usuario, $data_nascimento);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "erro-nulo";
                header("Location: ../pages/cadastro-tela-1.php?$erro_campos_nulos");
                exit;
            }
        }
    }

    UploadImagem($imagem_perfil);

    function UploadImagem($imagem_perfil){
        if($imagem_perfil['error']){
            $erro_imagem = "erro-arquivo";
            header("Location: ../pages/cadastro-tela-1.php?$erro_imagem");
            exit;
        }
        if($imagem_perfil['size'] > 4194304){
            $erro_tamanho_imagem = "erro-tamanho-arquivo";
            header("Location: ../pages/cadastro-tela-1.php?$erro_tamanho_imagem");
            exit;
        }else{
            $pasta_perfil = "../image/perfil/";
            $nome_imagem = $imagem_perfil['name'];
            $novo_nome_imagem = uniqid(); // criptografar o nome
            $extensao = strtolower(pathinfo($nome_imagem, PATHINFO_EXTENSION)); // path = caminho, dedutivo o resto
            if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg"){
                $erro_formato_imagem = "erro-formato-imagem";
                header("Location: ../pages/cadastro-tela-1.php?$erro_formato_imagem");
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
                    $_SESSION['imagem_perfil_cadastro'] = $dados_upload_imagem;
                }else{
                    $erro_imagem = "erro-arquivo";
                    header("Location: ../pages/cadastro-tela-1.php?$erro_imagem");
                }
            }
        }
    }

    VerificarCaracteres($nome_usuario, $data_nascimento);
    function VerificarCaracteres($nome_usuario, $data_nascimento){
        if (preg_match('/^[a-zA-Z0-9_]+$/', $nome_usuario)){
            if(strlen($nome_usuario) < 32){
                $_SESSION['nome_usuario_cadastro'] = $nome_usuario;
                VerificarIdade($data_nascimento);
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