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
    <li><a class="active" href="nuevaLista.php">Nueva lista</a></li>
    <li><a href=".php">Listas compartidas</a></li>
    <li><a href=".php">Listas archivadas</a></li>
    <li class="log"><a href="inc/logout.php">Log out</a></li>
</ul>
</div>
</header>
    <?php
        $dp = mysql_connect("localhost", "root", "" );
        mysql_select_db("todo", $dp);
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location:index.html");
        } else {
            $cod_user = $_SESSION["usuario"];
            echo "
            <script type=\"text/javascript\">
            var nu = 2;
            function myFunction() {
                if (nu <= '40') {
                    var iq1 = document.createElement('INPUT');
                    iq1.setAttribute('type', 'text');
                    
                    iq1.setAttribute('name', 'tarea'+nu);
                    
                    var tr = document.createElement('TR');
                    var td1 = document.createElement('TD');
                    td1.appendChild(iq1);
                    td1.setAttribute('colspan', '2');
                    tr.appendChild(td1);
                    var wrapper = document.getElementById('myTable');
                    wrapper.appendChild(tr);
                    nu = nu+1;
                }
            }</script>";
        }
    ?>
    <div class="cuerpo">
    <h1><u><i>Nueva lista</i></u></h1>
    <form enctype='multipart/form-data' action='' method='post'>
    <table border=1 id="myTable">
        <tr>
            <th colspan=2>Nombre:</th>
        </tr>
        <tr>
            <td colspan=2><input type="text" name="list_name"/></td>
        </tr>
        <tr>
            <th>Tareas:</th><th><button type="button" onclick="myFunction()">Add more</button></th>
        </tr>
        <tr>
            <td colspan=2><input type="text" name="tarea1"/></td>
        </tr>
    </table>
    <input type='submit' name='guardar' value='Guardar'/>
    </form>
    
   <?php
if(isset($_POST['guardar'])){
	$list_name = $_POST['list_name'];
    //$fecha = ;
    
        //$sartu="INSERT INTO listas (cod_user, list_name, creation_date, status) VALUES ('$cod_user', '$list_name', '$conce', '$price')";
        $sartu="INSERT INTO listas (cod_user, list_name, status) VALUES ('$cod_user', '$list_name', 'correcto')";
        mysql_query($sartu);
        for ($i=1; $i<=41; $i++){
            if ($_POST['tarea'.$i]!=""){
                $tarea = $_POST['tarea'.$i];
                $insertarea = "INSERT INTO tareas (descripcion) VALUES ('$tarea')";
                mysql_query($insertarea);
                $selsql = "";
                $selsql2 = mysql_query($selsql);
                while ($row2 = mysql_fetch_assoc($selsql2)) {
                    $insertcon = "INSERT INTO contenido (cod_piece,cod_mat,quantity,remarks) VALUES ('$cod_piece','$cod_mat','$canti','$remarks')";
                    mysql_query($insertcon);
                }
            }
        }
        echo "Lista añadida correctamente.<br/>";
        //header("Refresh:0;");
    mysql_close($dp);
}
?>
</div>
<a href="#" class="go-top" id="go-top">Go up</a>
</body>
</html>