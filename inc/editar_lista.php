
    <?php
        include_once('conses.php');
        $cod_lista = $_GET['cod_lista'];
        
        $sql = "SELECT * FROM listas WHERE status = 'correcto' AND cod_lista = '$cod_lista'";
        $lst = mysql_query($sql);
        $listas = array();
        $tareas = array();
        var_dump($lst);
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
        }/*
        while ($row = mysql_fetch_assoc($lst)) {
            
            echo "<form enctype='multipart/form-data' action='inc/edit_list.php?cod_lista=".$cod_lista."' method='post'><table border=1>
            <tr><th>NOMBRE</th></tr>
            <tr><td><input type='text' name='$cod_lista' value='".$row['list_name']."'></td>
            </tr>";

            echo "<tr><th>TAREAS</th></tr>";
            
            $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$cod_lista."' AND status = 'correcto'";
            $lst2 = mysql_query($sql2);
            while ($row2 = mysql_fetch_assoc($lst2)) {
                echo "<tr><td><input type='text' name='".$row2['cod_tarea']."' value='".$row2['descripcion']."'></td></tr>";
            }
            $sql3 = "SELECT * FROM contenido WHERE cod_lista = '".$cod_lista."' AND status = 'checked'";
            $lst3 = mysql_query($sql3);
            while ($row3 = mysql_fetch_assoc($lst3)) {
                echo "<tr><td><s><input type='text' name='".$row3['cod_tarea']."' value='".$row3['descripcion']."'></s></td></tr>";
            }
            echo "<tr><td><input class='button1' type='submit' name='guardar' value='Guardar'/></td></tr></form>";
            echo "</table><br/>";
        }*/
        mysql_close($dp);
        $json_string = json_encode($listas);
        echo $json_string;

    ?>