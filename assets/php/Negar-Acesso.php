<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])) { // PAGINA CRIADA PARA QUE O USUÁRIO NÃO COPIE A URL DA PÁGINA PRINCIPAL E ENTRE SEM REALIZAR O LOGIN.
        echo "Você deve está logado para acessar está página";
        die();
    }
?>