<?php

    $dp = mysql_connect("localhost", "root", "" );
    mysql_select_db("todo", $dp);
    $cod_lista = $_GET['cod_lista'];
    echo $cod_lista;
    
    $aldatu="UPDATE listas SET status='correcto' WHERE cod_lista='".$cod_lista."'";
    mysql_query($aldatu);

    mysql_close($dp);
    header("Location: ../archivadas.php");
    
?>