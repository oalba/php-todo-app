<?php
include 'con.php';
$name = $_POST[name];
$user = $_POST[username];
$upassword = $_POST[password];
$urpassword = $_POST[rpassword];
 
$salt = "SecuritySalt";
$password = hash('sha256', $salt.$upassword);
 
if ($upassword!=$urpassword) {
    echo "Las contraseñas no coinciden. <a href='../index.html'>Volver</a>";
} else {
    $gehitu="INSERT INTO users (name,username,password) VALUES ('$name','$user','$password')";
    mysql_query($gehitu);
    echo "user created";
    header("Location: ../index.html");
}

?>