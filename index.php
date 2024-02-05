<?php
    include("assets/php/conexao.php");
    include("assets/php/Puxar-Dados-Login.php");
    include("assets/php/Puxar-Postagens.php");
?>   
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/fontes.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/postagem.css">
    <link rel="icon" href="assets/image/pandim-logo.png">
    <title>Pandim</title>
</head>
<body>
    <nav class="container-cabecalho">
        <span>
            <img class="logo-cabecalho" src="assets/image/pandim-logo.png" alt="LOGO">
            <label class="nome-cabecalho">PANDIM</label>
        </span>
        <span class="logo-span">
            <a href=""><img class="cabecalho-imagem" src="assets/image/icon/home.png" alt="icon">
            <br>Home</a>
        </span>
        <span class="<?php echo $classe_nao_logado; ?>">
            <a href="assets/pages/criar-postagem.php"><img class="cabecalho-imagem" src="assets/image/icon/criar.png" alt="icon">
            <br>Criar</a>
        </span>
        <span class="<?php echo $classe_nao_logado; ?>">
            <a href="assets/pages/perfil.php?perfil=<?php echo $nome_usuario; ?>"><img class="cabecalho-imagem" src="assets/image/icon/perfil.png" alt="icon">
            <br>Perfil</a>
        </span>
        <span>
            <a href=""><img class="cabecalho-imagem" src="assets/image/icon/sobre nos.png" alt="icon">
            <br>Sobre nós</a>
        </span>
        <span class="<?php echo $classe_login; ?>">
            <a href="assets/pages/login.php"><img class="cabecalho-imagem" src="assets/image/icon/login.png" alt="icon">
            <br>Entrar</a>
        </span>
        <span class="<?php echo $classe_login; ?>">
            <a href="assets/pages/cadastro-tela-1.html"><img class="cabecalho-imagem" src="assets/image/icon/cadastro.png" alt="icon">
            <br>Cadastrar</a>
        </span>
    </nav>
    <div class="container-principal">
        <div class="container-perfil">
            <h1>Seu Perfil</h1>
            <img class="imagem_perfil" src="<?php echo $imagem_perfil; ?>" alt="Imagem-de-Perfil"> 
            <label><?php echo $nome_usuario;?></label>
            <label class="<?php echo $classe_nao_logado; ?>">0 Seguidores</label>
            <label class="<?php echo $classe_nao_logado; ?>">0 Seguindo</label>
            <br>
            <button class="postagem-btn <?php echo $classe_nao_logado; ?>" id="postagem-btn">Nova Postagem</button>
            <p></p>
            <img id="deslogar-btn" class="deslogar-imagem <?php echo $classe_nao_logado; ?>" src="assets/image/icon/deslogar.png" alt="Clique aqui para desconectar">
        </div>
        <hr>
        <div class="container-postagem">
            <h1>Postagens do Momento</h1>
            <p></p>
            <?php
                PuxarPostagens($mysqli, $resultado);
            ?>
        </div>
        <hr>
        <div class="container-em-alta">
            <h1>Temas em Alta</h1>
            <div class="tema-alta-div">
                Futebol
            </div>
            <br>
            <div class="tema-alta-div">
                Famosos
            </div>
            <br>
            <div class="tema-alta-div">
                Educação
            </div>
            <br>
            <div class="tema-alta-div">
                Cultura
            </div>
            <br>
            <div class="tema-alta-div">
                Arte
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/index.js"></script>
</body>
</html>