<?php
$dp = mysql_connect("localhost", "root", "" );
mysql_select_db("todo", $dp);
$name = "Admin";
$user = "admin";
$upassword = "zubiri";
 
$salt = "SecuritySalt";
$password = hash('sha256', $salt.$upassword);
 
echo $password;
$gehitu="INSERT INTO users (name,username,password) VALUES ('$name','$user','$password')";
mysql_query($gehitu);
echo "user created";
?>