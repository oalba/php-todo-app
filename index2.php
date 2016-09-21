<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script type="text/javascript" src="js/scripts.js" ></script>
</head>
<body>
<header>
<div class="nav">
<ul>
    <li><a class="active" href="index2.php">Mis listas</a></li>
    <li><a href="nuevaLista.html">Nueva lista</a></li>
    <li><a href="compartidas.php">Listas compartidas</a></li>
    <li><a href="archivadas.php">Listas archivadas</a></li>
    <li class="log"><a href="inc/logout.php">Log out</a></li>
</ul>
</div>
</header>
<body>
    <div class="cuerpo">
    <?php
        include 'inc/conses.php';
        
        $sql = "SELECT * FROM listas WHERE cod_user = '$cod_user' AND status = 'correcto'";
        $lst = mysql_query($sql);
        while ($row = mysql_fetch_assoc($lst)) {
            
            echo "<table border=1>
            <tr><th colspan=3>NOMBRE</th></tr>
            <tr><td><button><a href='inc/archivar_lista.php?cod_lista=".$row['cod_lista']."' style=\"text-decoration:none\">Archivar</a></button></td>
            <td><!--<button onclick=\"seguroList('$row[cod_lista]','$row[list_name]');\">Eliminar</button>--><button><a href='inc/delete_lists.php?cod_lista=".$row['cod_lista']."' style=\"text-decoration:none\">Eliminar</a></button></td>
            <td>".$row['list_name']."</td>";
            
            echo "<td>Compartir con: 
            <form enctype='multipart/form-data' action='inc/share_list.php?cod_lista=".$row['cod_lista']."' method='post'><select name='share'>
            <option selected='selected'></option>";
            $sql4 = "SELECT * FROM users";
            $lst4 = mysql_query($sql4);
            while ($row4 = mysql_fetch_assoc($lst4)) {
                if ($row4[cod_user]!=$cod_user) {
                    echo "<option value='".$row4[cod_user]."'>$row4[name]</option>";
                }
            }
            echo "</select><input type='submit' name='compartir' value='Compartir'/></form></td></tr>";
            
            echo "<form enctype='multipart/form-data' action='inc/check_tarea.php?cod_lista=".$row['cod_lista']."' method='post'>";
            echo "<tr><th colspan=3>TAREAS</th></tr>";
            
            $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."' AND status = 'correcto'";
            $lst2 = mysql_query($sql2);
            while ($row2 = mysql_fetch_assoc($lst2)) {
                echo "<tr><td><button><a href='inc/del_tarea.php?cod_lista=".$row['cod_lista']."&cod_tarea=".$row2['cod_tarea']."' style=\"text-decoration:none\">Eliminar</a></button></td><td><input type='checkbox' name='check[]' value='".$row2['cod_tarea']."'/></td><td>".$row2['descripcion']."</td></tr>";
            }
            $sql3 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."' AND status = 'checked'";
            $lst3 = mysql_query($sql3);
            while ($row3 = mysql_fetch_assoc($lst3)) {
                echo "<tr><td><button><a href='inc/del_tarea.php?cod_lista=".$row['cod_lista']."&cod_tarea=".$row3['cod_tarea']."' style=\"text-decoration:none\">Eliminar</a></button></td><td><input type='checkbox' name='check[]' value='".$row3['cod_tarea']."' checked/></td><td><s>".$row3['descripcion']."</s></td></tr>";
            }
            echo "<tr><td colspan=3><input type='submit' name='guardar' value='Guardar'/></td></tr></form>";
            echo "<form enctype='multipart/form-data' action='inc/add_tarea.php?cod_lista=".$row['cod_lista']."' method='post'><tr><td colspan=2><input type='text' name='tarea'/></td><td><input type='submit' name='anadir' value='Añadir'/></td></tr></form></table><br/>";
        }
        mysql_close($dp);
    ?>
<a href="#" class="go-top" id="go-top">Go up</a>
</div>
</body>
</html>