<?php

    function IsChecked($chkname,$value){
        if(!empty($_POST[$chkname])){
            foreach($_POST[$chkname] as $chkval){
                if($chkval == $value){
                    return true;
                }
            }
        }
        return false;
    }
    include 'con.php';
    $cod_lista = $_GET['cod_lista'];
    
    $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$cod_lista."'";
    $lst2 = mysql_query($sql2);
    while ($row2 = mysql_fetch_assoc($lst2)) {
        $cod_tarea = $row2['cod_tarea'];
        if (IsChecked('check',$cod_tarea)){
            //echo "$cod_lista $cod_tarea";
            $aldatu="UPDATE contenido SET status='checked' WHERE cod_lista='".$cod_lista."' AND cod_tarea='".$cod_tarea."'";
            mysql_query($aldatu);
        } else {
            //echo $cod_tarea." ".$_POST[$cod_tarea];
            $aldatu="UPDATE contenido SET status='correcto' WHERE cod_lista='".$cod_lista."' AND cod_tarea='".$cod_tarea."'";
            mysql_query($aldatu);
        }
        
    }
    mysql_close($dp);
    header("Location: ../index2.php");
    
?>