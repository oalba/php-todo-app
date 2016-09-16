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
        
        $sql = "SELECT * FROM listas WHERE cod_user = '$cod_user'";
        $lst = mysql_query($sql);
        while ($row = mysql_fetch_assoc($lst)) {
            echo "<table border=1>
            <tr><th>NOMBRE</th></tr>
            <tr><td>".$row['list_name']."</td></tr>
            <tr><th>TAREAS</th></tr>";
            $sql2 = "SELECT * FROM contenido WHERE cod_lista = '".$row['cod_lista']."'";
            $lst2 = mysql_query($sql2);
            while ($row2 = mysql_fetch_assoc($lst2)) {
                echo "<tr><td>".$row2['descripcion']."</td></tr>";
            }
            echo "</table><br/>";
        }
        mysql_close($dp);
    ?>
<a href="#" class="go-top" id="go-top">Go up</a>
</div>
</body>
</html>