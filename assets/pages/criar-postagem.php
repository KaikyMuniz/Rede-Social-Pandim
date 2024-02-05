<?php
    include("../php/Negar-Acesso.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/icon/criar.png">
    <link rel="stylesheet" type="text/css" href="../css/criar-postagem.css">
    <link rel="stylesheet" type="text/css" href="../css/fontes.css">
    <title>Crie sua postagem!</title>
</head>
<body>
    <div class="container">
        <form action="../php/Criar-Nova-Postagem.php" enctype="multipart/form-data" method="POST">
            <h1>Crie sua postagem!</h1>
            <label>Qual será o título de sua postagem?</label>
            <br>
            <input type="text" id="titulo" name="titulo" placeholder="Insira aqui o título:">
            <p></p>
            <label>Qual a descrição de sua postagem?</label>
            <br>
            <textarea id="descricao" name="descricao" placeholder="Insira aqui sua descrição:"></textarea>
            <p></p>
            <input type="file" id="imagem-postagem" name="imagem-postagem" class="imagem-postagem">
            <p></p>
            <label>Antes de criar sua postagem, confirme se sua postagem não fere  <a href="#">Nossos Termos</a></label>
            <br>
            <p></p>
            <input type="submit" value="Criar Postagem" id="confirma" name="confirma" class="btn-continuar">
        </form>
    </div>
</body>
</html>