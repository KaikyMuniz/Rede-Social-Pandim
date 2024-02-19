<?php
    include("../php/Enviar-Codigo-Email.php");
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
<body>
    <div class="container">
        <div class="card">
            <form action="../php/Verificar-Codigo-Email.php" enctype="multipart/form-data" method="POST">
                <h1>Um email foi enviado para<br><?php echo $email; ?></h1>
                <label for="user">Insira o código que você recebeu:</label>
                <br>
                <input type="text" name="codigo" id="codigo" placeholder="Código:">
                <?php
                    if(isset($_GET['erro-codigo'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ O código inserido não confere com o código enviado no email<br>Por isso, enviamos um novo código.
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
        <div id="btn-ordem-3" class="btn-ordem"></div>
        <div id="btn-ordem-4" class="btn-ordem btn-ordem-ativado"></div>        
    </div>
    <script type="text/javascript" src= "../js/tratar-erros.js"></script>
</body>
</html>