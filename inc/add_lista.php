<?php
    include 'conses.php';

    	$list_name = $_POST['list_name'];
        //$fecha = ;
        $cod_list1 = mysql_query('SELECT MAX(cod_lista) AS cod_list FROM listas');
        $cod_list2 = mysql_result($cod_list1,0,0);
        //$cod_list1 = 0; //ploblema con la primera lista!!!!!!!!!!!!!!!!!!!
        $cod_list = $cod_list2+1; 
        //$sartu="INSERT INTO listas (cod_user, list_name, creation_date, status) VALUES ('$cod_user', '$list_name', '$conce', '$price')";
        $sartu="INSERT INTO listas (cod_lista,cod_user, list_name, status) VALUES ('$cod_list', '$cod_user', '$list_name', 'correcto')";
        mysql_query($sartu);
        for ($i=1; $i<=41; $i++){
            if ($_POST['tarea'.$i]!=""){
                $tarea = $_POST['tarea'.$i];
                $cod_tarea1 = mysql_query('SELECT MAX(cod_tarea) AS cod_tarea FROM contenido');
                $cod_tarea2 = mysql_result($cod_tarea1,0,0);
                $cod_tarea = $cod_tarea2+1;
                $insertarea = "INSERT INTO contenido (cod_lista, cod_tarea, status, descripcion) VALUES ('$cod_list', '$cod_tarea', 'correcto', '$tarea')";
                mysql_query($insertarea);
            }
        }
        echo "Lista añadida correctamente.<br/>";
        header("Location: ../nuevaLista.php");
    mysql_close($dp);
    ?>