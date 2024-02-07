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
<body class="etapa3">
    <div class="container">
        <div class="card">
            <form action="../php/Verificar-Cadastro-Etapa-3.php" method="POST">
                <h1>Você está quase lá <?php echo $_SESSION['nome_usuario_cadastro']; ?>!</h1>
                <h2>Agora insira sua descrição:</h2>
                <textarea id="descricao" name="descricao" placeholder="Dedique esse campo para falar sobre você :)"></textarea>
                <?php
                    if(isset($_GET['erro-nulo'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Você deve preencher o campo acima
                        </label>";
                    }
                    if(isset($_GET['erro-numero-caracter'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ A descrição deve ter no máximo 200 caracteres
                        </label>";
                    }
                ?>
                <p></p>
                <button class="btn-continuar" id="continuar">Continuar</button>
            </form>
        </div>
    </div>
    <div class="container-sequencia">
        <div id="btn-ordem-1" class="btn-ordem"></div>
        <div id="btn-ordem-2" class="btn-ordem"></div>
        <div id="btn-ordem-3" class="btn-ordem btn-ordem-ativado"></div>
        <div id="btn-ordem-4" class="btn-ordem"></div>        
    </div>
</body>
<script type="text/javascript" src="../js/tratar-erros.js"></script>
</html>