<?php
    include 'conses.php';

    	$cod_lista = $_GET['cod_lista'];
    	$tarea = $_POST['tarea'];
        $cod_tarea1 = mysql_query("SELECT MAX(cod_tarea) FROM contenido WHERE cod_lista='$cod_lista'");
        $cod_tarea2 = mysql_result($cod_tarea1,0,0);
        $cod_tarea = $cod_tarea2+1; 
        $sartu="INSERT INTO contenido (cod_lista, cod_tarea, status, descripcion) VALUES ('$cod_lista', '$cod_tarea', 'correcto', '$tarea')";
        mysql_query($sartu);
        header("Location: ../index2.php");
    mysql_close($dp);
?>