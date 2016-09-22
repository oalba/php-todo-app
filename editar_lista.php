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
    <li><a href="index2.php">Mis listas</a></li>
    <li><a href="nuevaLista.html">Nueva lista</a></li>
    <li><a href="compartidas.php">Listas compartidas</a></li>
    <li><a href="archivadas.php">Listas archivadas</a></li>
    <li><a class="active" href="#">Editar lista</a></li>
    <li class="log"><a href="inc/logout.php">Log out</a></li>
</ul>
</div>
</header>
<body>
    <div class="cuerpo">
    <?php
        include 'inc/conses.php';
        $cod_lista = $_GET['cod_lista'];
        
        $sql = "SELECT * FROM listas WHERE status = 'correcto' AND cod_lista = '$cod_lista'";
        $lst = mysql_query($sql);
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
        }
        mysql_close($dp);
    ?>
<a href="#" class="go-top" id="go-top">Go up</a>
</div>
</body>
</html>