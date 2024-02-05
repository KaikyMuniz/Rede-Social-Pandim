<?php
    include("../php/conexao.php");
    include("../php/Puxar-Dados-Perfil.php");
    include("../php/Puxar-Postagens-de-Um-Usuario.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../css/fontes.css"/>    
    <link rel="stylesheet" type="text/css" href="../css/perfil.css"/>
    <link rel="stylesheet" type="text/css" href="../css/postagem.css"/>
    <link rel="icon" href="<?php echo $imagem_perfil; ?>"/>
    <title>Perfil de <?php echo $nome_usuario; ?></title>
</head>
<body>
    <div class="container-principal">
        <div class="dados-usuario">
            <img class="foto-perfil" src="<?php echo $imagem_perfil; ?>" alt="imagem de perfil"/>
            <br/>
            <div class="container">
                <h1><?php echo $nome_usuario; ?></h1>
                <label>Nome de usuário: </label><label><?php echo $nome_usuario; ?></label>
                <br/>
                <label>Descrição: </label><label><?php echo $descricao; ?></label>
                <br/>
                <label>Seguidores: </label><label><?php echo $seguidores; ?></label>
                <br/>
                <label>Seguindo: </label><label><?php echo $seguindo; ?></label>
            </div>
        </div>
        <div class="postagens-usuario">
            <?php
                PuxarPostagens($mysqli, PuxarDados($mysqli, $nome_usuario));
            ?>
        </div>
    </div>
</body>
</html>