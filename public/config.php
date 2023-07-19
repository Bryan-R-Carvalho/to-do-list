<?php
    // Configurações do banco de dados
    $hostname = 'localhost:3308';
    $username = 'root';
    $password = '';
    $dbname = 'to_do_list';

    // Conecta ao banco de dados
    $link = mysqli_connect($hostname, $username, $password);
    
    $db_selected = mysqli_select_db($link, $dbname);
    if(!$db_selected){
        mysqli_query($link, "CREATE DATABASE $dbname");
    }
    
    mysqli_query($link, "CREATE TABLE IF NOT EXISTS tasks (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        task VARCHAR(30) NOT NULL,
        description VARCHAR(100) NOT NULL,
        date DATE NOT NULL,
        completed BOOLEAN NOT NULL
    )");
    

    // Verifica a conexão
    if (!$link) {
        die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
    }
?>
