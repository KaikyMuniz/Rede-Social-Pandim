<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/fontes.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="icon" href="../image/icon/login.png">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="img-container">
            <img src="../image/pandim-logo.png" alt="Imagem-login">
            <br>
            <label>Confira os <a href="">Termos de Uso</a> da nossa rede social</label>
        </div>
        <hr>
        <div class="login-container">
            <form action="../php/Realizar-Login.php" method="POST">
                <h1>Bem vindo(a) de volta!</h1>
                <br>
                <label for="user">Insira seu Nome de Usuário ou Email:</label>
                <br>
                <input type="text" id="user" name="user" placeholder="Nome de Usuário ou Email:">
                <p></p>
                <label for="senha">Insira sua Senha:</label>
                <br>
                <input type="password" id="senha" name="senha" placeholder="Senha:">
                <?php
                    if(isset($_GET['erro-usuario'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Nenhum usuário encontrado
                        </label>";      
                    }
                    if(isset($_GET['erro-senha'])){
                        echo 
                        "<br>
                        <label id='erroMensagem' class='erro-mensagem'>
                            ⚠ Senha Incorreta
                        </label>";      
                    }
                ?>
                <p></p>
                <div class="container-btn-center">
                    <input class="btn-submit" type="submit" value="Entrar">
                </div>
                <br>
                <p>Ainda não tem uma conta?<br><a href="cadastro-tela-1.html">Faça seu cadastro clicando aqui</a></p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../js/tratar-erros.js"></script>
</body>
</html>