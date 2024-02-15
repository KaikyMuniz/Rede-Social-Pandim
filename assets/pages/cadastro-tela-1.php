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
            <form action="../php/Verificar-Cadastro-Etapa-1.php" enctype="multipart/form-data" method="POST">
                <h1>Bem vindo(a) ao Pandim!</h1>
                <img class="logo" src="../image/pandim-logo.png" alt="Logo Pandim"/>
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

                    if(isset($_GET['erro-usuario-ja-existe'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ O nome de usuário inserido já existe
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
    <script type="text/javascript" src= "../js/tratar-erros.js"></script>
</body>
</html>