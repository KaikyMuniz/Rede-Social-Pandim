<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/fontes.css">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="icon" href="../image/icon/cadastro.png">
    <title>Cadastro</title>
</head>
<body class="seleciona-imagem">
    <div class="container">
        <div class="card">
            <!--O Enctype é oque permite o upload de arquivos-->
            <form action="../php/Verificar-Perfil-Imagem.php" enctype="multipart/form-data" method="POST">
                <h1>Seja bem vindo ao Pandim!</h1>
                <h2>Para finalizarmos, <br>selecione abaixo a sua foto de perfil</h2>
                <img class="escolher-imagem" id="escolher-imagem" src="../image/icon/perfil icon.png" alt="icon">
                <?php
                    if(isset($_GET['erro-arquivo'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Erro no upload do arquivo, tente novamente em breve
                        </label><br>";
                    }

                    if(isset($_GET['erro-tamanho-arquivo'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Seleciona uma imagem com menos de 4MB
                        </label><br>";
                    }

                    if(isset($_GET['erro-formato-imagem'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Formato da imagem inválido! Utilize png, jpg ou jpeg
                        </label><br>";
                    }
                ?>
                <br>
                <label class="escolher-imagem-label" for="escolher-imagem-input">Escolher imagem de perfil</label>
                <input type="file" id="escolher-imagem-input" class="escolher-imagem-input" name="escolher-imagem-input" id="escolher-imagem-input">
                <p></p>
                <button class="btn-continuar" id="continuar">Continuar</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src= "../js/cadastro-tela-1.js"></script>
    <script type="text/javascript" src= "../js/tratar-erros.js"></script>
</body>
</html>