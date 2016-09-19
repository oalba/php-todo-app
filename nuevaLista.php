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
    
    <script type="text/javascript">
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
        }
    </script>
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
    include 'inc/conses.php';
    if(isset($_POST['guardar'])){
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
        //header("Refresh:0;");
    mysql_close($dp);
    }
    ?>
</div>
<a href="#" class="go-top" id="go-top">Go up</a>
</body>
</html>