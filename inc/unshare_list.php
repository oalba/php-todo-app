<?php
$cod_lista = $_GET['cod_lista'];
$cod_user = $_GET['cod_user'];
include "con.php";
$eliminar="DELETE FROM listas_users WHERE cod_lista='$cod_lista' AND cod_user='$cod_user'";
mysql_query($eliminar);
header("Location: ../compartidas.php");
mysql_close($dp);
?>