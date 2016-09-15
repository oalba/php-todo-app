<?php
$user = $_POST['username'];
$password = $_POST['password'];
$salt = "SecuritySalt";
$pass = hash('sha256', $salt.$password);
$dp = mysql_connect("localhost", "root", "" );
mysql_select_db("todo", $dp);
$sql = "SELECT * FROM users" ;
$resultado = mysql_query($sql);
while ($row = mysql_fetch_assoc($resultado)) {
 if ($row['username'] == $user) {
   $pasa = $row['password'];
   $cod = $row['cod_user'];
 };
};
if (isset($pasa)) {
 if ($pass == $pasa) {
  session_start();
  $_SESSION["usuario"]=$cod;
  //session_start();
  //$_SESSION["tipo"]=$tipo;
  header("location:../index2.php");
 } else {
 	//echo "$pass $pasa";
  header("location:../index.html");
 };
} else {
 header("location:../index.html");
};
mysql_close($dp);
?>