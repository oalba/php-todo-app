<?php
    include 'conses.php';
    try {
        
        $sql = "SELECT * FROM listas WHERE cod_user = '$cod_user' AND status = 'correcto'";
        $lst = mysql_query($sql);
        $listas = array();
        $tareas = array();
        $users = array();
        while ($row = mysql_fetch_assoc($lst)) {
            $cod_lista = $row['cod_lista'];
            $list_name = $row['list_name'];
            
            $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."'";
            $lst2 = mysql_query($sql2);
            while ($row2 = mysql_fetch_assoc($lst2)) {
                $cod_tarea = $row2[cod_tarea];
                $status = $row2[status];
                $descripcion = $row2[descripcion];
                $tareas[] = array('cod_lista'=> $cod_lista, 'cod_tarea'=> $cod_tarea, 'status'=> $status, 'descripcion'=> $descripcion);
            }
            $listas[] = array('cod_lista'=> $cod_lista, 'list_name'=> $list_name, 'tareas' => $tareas);
        }
        /*$sql4 = "SELECT * FROM users WHERE cod_user != '$cod_user'";
        $lst4 = mysql_query($sql4);
        while ($row4 = mysql_fetch_assoc($lst4)) {
            $cod_user = $row4[cod_user];
            $user_name = $row4[name];
            $users[] = array('cod_user' => $cod_user, 'user_name' => $user_name);
            //if ($row4[cod_user]!=$cod_user) {
                
            //}
        }*/
        mysql_close($dp);
        $json_string = json_encode($listas);
        echo $json_string;
        /*$json_string2 = json_encode($users);
        echo $json_string2;*/
        
    } catch (Exception $ex) {
        echo "Ha habido un error: ".$ex->getMessage();
    }
?>