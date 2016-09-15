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
    <?php
        $dp = mysql_connect("localhost", "root", "" );
        mysql_select_db("todo", $dp);
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:index.html");
        } else {
            $cod_user = $_SESSION["usuario"];
        }
        $sql = "SELECT * FROM listas WHERE cod_user = $cod_user";
        $lst = mysql_query($sql);
        while ($row = mysql_fetch_assoc($lst)) {
            echo "aaa";
        }
    ?>
<a href="#" class="go-top" id="go-top">Go up</a>
</body>
</html>