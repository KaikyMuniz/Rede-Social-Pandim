<?php
    session_start();
    $imagem_perfil = $_FILES['escolher-imagem-input'];
    $nome_usuario = $_POST['user'];
    $data_nascimento = $_POST['nascimento'];

    VerificarNulos($imagem_perfil, $nome_usuario, $data_nascimento);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "Os campos não devem ser nulos";
                header("Location: ../pages/cadastro-tela-1.html?$erro_campos_nulos");
                exit;
            }
        }
    }

    UploadImagem($imagem_perfil);

    function UploadImagem($imagem_perfil){
        if($imagem_perfil['error']){
            $erro_imagem = "Falha ao enviar arquivo";
            header("Location: ../pages/cadastro-tela-1.html?erro=$erro_imagem");
            exit;
        }
        if($imagem_perfil['size'] > 4194304){
            $erro_tamanho_imagem = "Arquivo muito grande! Máximo: 4MB";
            header("Location: ../pages/cadastro-tela-1.html?erro=$erro_tamanho_imagem");
            exit;
        }else{
            $pasta_perfil = "../image/perfil/";
            $nome_imagem = $imagem_perfil['name'];
            $novo_nome_imagem = uniqid(); // criptografar o nome
            $extensao = strtolower(pathinfo($nome_imagem, PATHINFO_EXTENSION)); // path = caminho, dedutivo o resto
            if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg"){
                $erro_formato_imagem = "Formato de imagem inválido! Utilize jpg, png ou jpeg";
                header("Location: ../pages/cadastro-tela-1.html?erro=$erro_formato_imagem");
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
                    header("Location: ../pages/cadastro-tela-1.html");
                }
            }
        }
    }

    VerificarCaracteres($nome_usuario, $data_nascimento);
    function VerificarCaracteres($nome_usuario, $data_nascimento){
        if (preg_match('/^[a-zA-Z0-9_]+$/', $nome_usuario)){
            $_SESSION['nome_usuario_cadastro'] = $nome_usuario;
            $_SESSION['data_nascimento_cadastro'] = $data_nascimento;
            header("Location: ../pages/cadastro-tela-2.php");
            exit;
        }
        else {
            $erro_caracter = "Use apenas letras, números ou '_'";
            header("Location: ../pages/cadastro-tela-1.html?erro=$erro_caracter");
        }
    }
?>