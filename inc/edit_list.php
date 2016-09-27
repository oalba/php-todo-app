<?php
    $cod_lista = $_GET['cod_lista'];
    $list_name = $_POST[$cod_lista];
    include "con.php";
    $aldatu="UPDATE listas SET list_name='$list_name' WHERE cod_lista='$cod_lista'";
    mysql_query($aldatu);
    //echo "$cod_lista";
    //echo "$list_name";
    
    $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$cod_lista."'";
    $lst2 = mysql_query($sql2);
    while ($row2 = mysql_fetch_assoc($lst2)) {
        $cod_tarea = $row2[cod_tarea];
        $descripcion = $_POST[$cod_tarea];
        //echo "<tr><td><input type='text' name='".$row2['cod_tarea']."' value='".$row2['descripcion']."'></td></tr>";
        $aldatu2="UPDATE contenido SET descripcion='$descripcion' WHERE cod_lista='$cod_lista' AND  cod_tarea='$cod_tarea'";
        mysql_query($aldatu2);
        
        //echo "$_POST[$cod_tarea]<br/>";
        //echo "$cod_tarea<br/><br/>";
    }

    header("Location: ../editar_lista.php?cod_lista=".$cod_lista);
    mysql_close($dp);
?>