<?php 
    include("Negar-Acesso.php");

    $autor = $_SESSION['nome'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem_postagem = $_FILES['imagem-postagem'];

    $array_total = [$autor, $titulo, $descricao, $imagem_postagem];

    VerificarPostagem($array_total);

    function VerificarPostagem($array_total){
        foreach($array_total as $dados){
            if($dados === ''){
                echo "Preencha todos os dados!";
                exit;
            }
        }
    }
    
    VerificarNulos($array_total);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "Os campos não devem ser nulos";
                header("Location: ../pages/criar-postagem.php?$erro_campos_nulos");
                exit;
            }
        }
    }

    UploadPostagemImagem($autor, $titulo, $descricao, $imagem_postagem);

    function UploadPostagemImagem($autor, $titulo, $descricao, $imagem_postagem){
        if($imagem_postagem['error']){
            $erro_imagem = "Falha ao enviar arquivo";
            header("Location: ../pages/criar-postagem.php?$erro_imagem");
            exit;
        }
        if($imagem_postagem['size'] > 4194304){
            $erro_tamanho_imagem = "Arquivo muito grande! Máximo: 4MB";
            header("Location: ../pages/criar-postagem.php?$erro_tamanho_imagem");
            exit;
        }else{
            $pasta_postagem = "../image/postagem/";
            $nome_imagem = $imagem_postagem['name'];
            $novo_nome_imagem = uniqid(); 
            $extensao = strtolower(pathinfo($nome_imagem, PATHINFO_EXTENSION)); // path = caminho, dedutivo o resto
            if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg"){
                $erro_formato_imagem = "Formato de imagem inválido! Utilize jpg, png ou jpeg";
                header("Location: ../pages/criar-postagem.php?$erro_formato_imagem");
                exit;
            }else{
                $path = $pasta_postagem . $novo_nome_imagem . "." . $extensao;
                $salvar_imagem = move_uploaded_file($imagem_postagem['tmp_name'], $path);
                if($salvar_imagem){
                    $dados_upload_imagem = array(
                        'nome_imagem' => $nome_imagem,
                        'path' => $path,
                        'salvar_imagem' => $salvar_imagem,
                    );
                    CriarPostagem($autor, $titulo, $descricao, $dados_upload_imagem);
                }else{
                    header("Location: ../pages/criar-postagem.php");
                }
            }
        }
    }

    function CriarPostagem($autor, $titulo, $descricao, $dados_upload_imagem){
        include("conexao.php");

        $stmt = $mysqli->prepare("INSERT INTO postagens (autor, titulo, 
        descricao, imagem_postagem, data_da_postagem) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $autor, $titulo, $descricao, $dados_upload_imagem['path']);

        $stmt_upload_postagem = $mysqli->prepare("INSERT INTO imagem_postagem 
        (nome_imagem, path, data_upload, nome_usuario) VALUES (?, ?, NOW(), ?)");
        $stmt_upload_postagem->bind_param("sss", $dados_upload_imagem['nome_imagem'],
        $dados_upload_imagem['path'], $autor);

        if($stmt->execute() && $stmt_upload_postagem->execute()){
            header("Location: ../../index.php");
            exit;
        }else{
            echo "Erro na criação da postagem";
        }
        $stmt->close();
        $stmt_upload_postagem->close();
        $mysqli->close();
    }
?>