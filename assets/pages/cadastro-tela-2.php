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
<body class="etapa2">
    <div class="container">
        <div class="card">
            <form action="../php/Verificar-Cadastro-Etapa-2.php" method="POST">
                <h1>Olá <?php echo $_SESSION['nome_usuario_cadastro']; ?>!<br>Vamos continuar o seu cadastro!</h1>
                <h2>Qual seu sexo?</h2>
                <span class="container-radio-input">
                <div>
                    <input class="radio" type="radio" value="M" name="sexo" id="masculino">
                    <label for="masculino">Masculino</label>
                </div>

                <div>
                    <input class="radio" type="radio" value="F" name="sexo" id="feminino">
                    <label for="feminino">Feminino</label>
                </div>

                <div>
                    <input class="radio" type="radio" value="O" name="sexo" id="outro">
                    <label for="outro">Outro</label>
                </div>
                
                <div>
                    <input class="radio" type="radio" value="P" name="sexo" id="prefiro">
                    <label for="prefiro">Prefiro não dizer</label>
                </div>
                </span>
                <?php
                    if(isset($_GET['erro-nulo'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Você deve selecionar alguma das opções acima
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
        <div id="btn-ordem-2" class="btn-ordem btn-ordem-ativado"></div>
        <div id="btn-ordem-3" class="btn-ordem"></div>
        <div id="btn-ordem-4" class="btn-ordem"></div>        
    </div>
</body>
<script type="text/javascript" src="../js/tratar-erros.js"></script>
</html>