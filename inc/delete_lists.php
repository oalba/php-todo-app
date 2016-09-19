<?php
$data = $_GET['cod_lista'];
include "con.php";
$aldatu="UPDATE listas SET status='eliminado' WHERE cod_lista='".$data."'";
mysql_query($aldatu);
/*$eliminar="DELETE FROM listas WHERE cod_lista='$data'";
mysql_query($eliminar);
$eliminar2="DELETE FROM contenido WHERE cod_lista='$data'";
mysql_query($eliminar2);*/
header("Location: ../index2.php");
mysql_close($dp);
?>