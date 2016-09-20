<?php

    include 'con.php';
    $cod_lista = $_GET['cod_lista'];
    $cod_user = $_POST['share'];
    
    $sartu="INSERT INTO listas_users (cod_lista,cod_user) VALUES ('$cod_lista', '$cod_user')";
    mysql_query($sartu);

    mysql_close($dp);
    header("Location: ../index2.php");
    
?>