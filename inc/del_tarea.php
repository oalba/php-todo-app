<?php
$cod_lista = $_GET['cod_lista'];
$cod_tarea = $_GET['cod_tarea'];
include "con.php";
$eliminar="DELETE FROM contenido WHERE cod_lista='$cod_lista' AND cod_tarea='$cod_tarea'";
mysql_query($eliminar);
header("Location: ../index2.html");
mysql_close($dp);
?>