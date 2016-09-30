<?php
include_once('con.php');
session_start();
if(!isset($_SESSION["usuario"])){
    header("location:index.html");
} else {
    $cod_user = $_SESSION["usuario"];
}
        
?>