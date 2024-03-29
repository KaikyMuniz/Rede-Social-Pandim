<?php 
    session_start();
?>
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
<body class="etapa4">
    <div class="container">
        <div class="card">
            <form action="../php/Verificar-Cadastro-Etapa-4.php" method="POST">
                <h1>Para finalizar!</h1>
                <h2>Insira os dados abaixo:</h2>
                <label for="email">Insira seu Email:</label>
                <br>
                <input type="email" name="email" id="email" placeholder="Email:">
                <?php
                    if(isset($_GET['erro-email-tamanho'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ O email deve ter no máximo 32 caracteres
                        </label>";
                    }
                ?>
                <p></p>
                <label for="senha">Insira sua Senha:</label>
                <br>
                <input type="password" name="senha" id="senha" placeholder="Senha:">
                <?php
                    if(isset($_GET['erro-nulo'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Você deve preencher todos os campos acima
                        </label>";
                    }
                    if(isset($_GET['erro-senha-tamanho'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ A senha deve ter entre 8 e 16 caracteres
                        </label>";
                    }
                ?>
                <p></p>
                <label>Confira os nossos termos de uso <a href=#>Clicando aqui</a>.</label>
                <p></p>
                <button class="btn-continuar" id="continuar">Criar Conta</button>
            </form>
        </div>
    </div>
    <div class="container-sequencia">
        <div id="btn-ordem-1" class="btn-ordem"></div>
        <div id="btn-ordem-2" class="btn-ordem"></div>
        <div id="btn-ordem-3" class="btn-ordem"></div>
        <div id="btn-ordem-4" class="btn-ordem btn-ordem-ativado"></div>        
    </div>
</body>
<script type="text/javascript" src="../js/tratar-erros.js"></script> 
</html>