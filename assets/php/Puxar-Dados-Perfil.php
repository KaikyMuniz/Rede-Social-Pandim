<?php
    include("conexao.php");

    $perfil_nome = explode("=", $_SERVER["REQUEST_URI"]);
    $perfil_nome = $perfil_nome[1];

    $sql_nome_perfil = "SELECT nome_de_usuario, descricao, seguidores, seguindo FROM usuarios WHERE nome_de_usuario = '$perfil_nome'";
    $resultado_nome_perfil = $mysqli->query($sql_nome_perfil);
    $sql_imagem_perfil = "SELECT path FROM imagem_perfil WHERE nome_usuario = '$perfil_nome'";
    $resultado_imagem_perfil = $mysqli->query($sql_imagem_perfil); 

    if ($resultado_nome_perfil && $resultado_imagem_perfil) {
        $row_perfil = $resultado_nome_perfil->fetch_assoc();
        $row_imagem = $resultado_imagem_perfil->fetch_assoc();
        $nome_usuario = $row_perfil['nome_de_usuario'];
        $descricao = $row_perfil['descricao'];
        $seguidores = $row_perfil['seguidores'];
        $seguindo = $row_perfil['seguindo'];
        $imagem_perfil = $row_imagem['path'];
    } else {
        echo "Erro na consulta: " . $mysqli->error;
    }
    
?>