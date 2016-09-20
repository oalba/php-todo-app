<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<header>
<div class="nav">
<ul>
    <li><a href="index2.php">Mis listas</a></li>
    <li><a href="nuevaLista.html">Nueva lista</a></li>
    <li><a class="active" href="compartidas.php">Listas compartidas</a></li>
    <li><a href="archivadas.php">Listas archivadas</a></li>
    <li class="log"><a href="inc/logout.php">Log out</a></li>
</ul>
</div>
</header>
<body>
    <div class="cuerpo">
    <?php
        include 'inc/conses.php';
        
        
        echo "<h1>Mis listas compartidas con otros</h1>";
        $sql = "SELECT * FROM listas,listas_users WHERE listas.cod_user = '$cod_user' AND listas.status = 'correcto' AND listas.cod_lista = listas_users.cod_lista";
        $lst = mysql_query($sql);
        while ($row = mysql_fetch_assoc($lst)) {
            //echo "<form  enctype='multipart/form-data' action='inc/check_tarea.php?cod_lista=".$row['cod_lista']."' method='post'>";
            echo "<table border=1><tr><td>
            <table border=1><tr><th>NOMBRE</th></tr>
            <tr>";
            //echo "<td><button><a href='inc/descompartir.php?cod_lista=".$row['cod_lista']."' style=\"text-decoration:none\">Dejar de compartir</a></button></td>";
            //echo "<td><!--<button onclick=\"seguroFac($row[cod_fac]);\">Eliminar</button>--><button><a href='inc/delete_lists.php?cod_lista=".$row['cod_lista']."' style=\"text-decoration:none\">Eliminar</a></button></td>";
            echo "<td>".$row['list_name']."</td>";
            echo "</tr>
            <tr><th>TAREAS</th></tr>";
            $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."' AND status = 'correcto'";
            $lst2 = mysql_query($sql2);
            while ($row2 = mysql_fetch_assoc($lst2)) {
                echo "<tr>";
                //echo "<input type='checkbox' name='check[]' value='".$row2['cod_tarea']."'/>";
                echo "<td>".$row2['descripcion']."</td></tr>";
            }
            $sql3 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."' AND status = 'checked'";
            $lst3 = mysql_query($sql3);
            while ($row3 = mysql_fetch_assoc($lst3)) {
                echo "<tr>";
                //echo "<input type='checkbox' name='check[]' value='".$row3['cod_tarea']."' checked/>";
                echo "<td><s>".$row3['descripcion']."</s></td></tr>";
            }
            //echo "<tr><td colspan=3><input type='submit' name='guardar' value='Guardar'/></td></tr>";
            echo "</table></td><td><table border=1>";
            echo "<tr><th colspan=2>Compartida con:</th></tr>";
            
            echo "</table></td></tr></table>";
            //echo "</form>";
            echo "<br/>";
        }
        echo "<h1>Listas de otros compartidas conmigo</h1>";
        mysql_close($dp);
    ?>
<a href="#" class="go-top" id="go-top">Go up</a>
</div>
</body>
</html>