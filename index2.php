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
    <li><a class="active" href="index2.php">Mis listas</a></li>
    <li><a href="nuevaLista.php">Nueva lista</a></li>
    <li><a href=".php">Listas compartidas</a></li>
    <li><a href=".php">Listas archivadas</a></li>
    <li class="log"><a href="inc/logout.php">Log out</a></li>
</ul>
</div>
</header>
<body>
    <div class="cuerpo">
    <?php
        $dp = mysql_connect("localhost", "root", "" );
        mysql_select_db("todo", $dp);
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:index.html");
        } else {
            $cod_user = $_SESSION["usuario"];
        }
        
        $sql = "SELECT * FROM listas WHERE cod_user = '$cod_user' AND status = 'correcto'";
        $lst = mysql_query($sql);
        while ($row = mysql_fetch_assoc($lst)) {
            echo "<form  enctype='multipart/form-data' action='inc/check_tarea.php?cod_lista=".$row['cod_lista']."' method='post'>";
            echo "<table border=1>
            <tr><th colspan=3>NOMBRE</th></tr>
            <tr><td><button>Archivar</button></td><td><button onclick=\"seguroFac($row[cod_fac]);\">Eliminar</button></td><td>".$row['list_name']."</td></tr>
            <tr><th colspan=3>TAREAS</th></tr>";
            $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."' AND status = 'correcto'";
            $lst2 = mysql_query($sql2);
            while ($row2 = mysql_fetch_assoc($lst2)) {
                echo "<tr><td></td><td><input type='checkbox' name='check[]' value='".$row2['cod_tarea']."'/></td><td>".$row2['descripcion']."</td></tr>";
            }
            $sql3 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."' AND status = 'checked'";
            $lst3 = mysql_query($sql3);
            while ($row3 = mysql_fetch_assoc($lst3)) {
                echo "<tr><td></td><td><input type='checkbox' name='check[]' value='".$row3['cod_tarea']."' checked/></td><td><s>".$row3['descripcion']."</s></td></tr>";
            }
            echo "<tr><td colspan=3><input type='submit' name='guardar' value='Guardar'/></td></tr></table></form><br/>";
        }
        mysql_close($dp);
    ?>
<a href="#" class="go-top" id="go-top">Go up</a>
</div>
</body>
</html>