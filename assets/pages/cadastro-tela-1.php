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
<body>
    <div class="container">
        <div class="card">
            <!--O Enctype é oque permite o upload de arquivos-->
            <form action="../php/Verificar-Cadastro-Etapa-1.php" enctype="multipart/form-data" method="POST">
                <h1>Bem vindo(a) ao Pandim!</h1>
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
                <br><br>
                <label for="user">Insira seu Nome de Usuário:</label>
                <br>
                <input type="text" name="user" id="user" placeholder="Nome de Usuário:">
                <?php
                    if(isset($_GET['erro-caracter'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Use apenas letras, números e underline
                        </label>";      
                    }

                    if(isset($_GET['erro-numero-caracter'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ O nome de usuário deve ter no máximo 32 caracteres
                        </label>";      
                    }
                ?>
                <p></p>
                <label for="nascimento">Qual sua Data de Nascimento?</label>
                <br>
                <input type="date" name="nascimento" id="nascimento">
                <?php
                    if(isset($_GET['erro-nulo'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Os campos não devem ser nulos
                        </label>";
                    }

                    if(isset($_GET['erro-idade'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Você deve ter pelo menos 18 anos para usar o Pandim
                        </label>";
                    }
                ?>
                <p></p>
                <button class="btn-continuar" id="continuar">Continuar</button>
            </form>
        </div>
    </div>
    <div class="container-sequencia">
        <div id="btn-ordem-1" class="btn-ordem btn-ordem-ativado"></div>
        <div id="btn-ordem-2" class="btn-ordem"></div>
        <div id="btn-ordem-3" class="btn-ordem"></div>
        <div id="btn-ordem-4" class="btn-ordem"></div>        
    </div>
    <script type="text/javascript" src= "../js/cadastro-tela-1.js"></script>
    <script type="text/javascript" src= "../js/tratar-erros.js"></script>
</body>
</html>