<?php 
    $usuario = 'root';
    $senha = '';
    $database = 'pandim_bd';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database); // ENTRAR NO MYSQL
    $mysqli -> set_charset("utf8mb4");
    if($mysqli->error){
        die("Falha ao se conectar com o banco de dados" . $mysqli->error); //VERIFICAR SE CONSEGUIU PUXAR A DATABASE, SENÃO, MORRE.
    }
?>