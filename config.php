<?php

$servername = "localhost";
$username = "redt";
$password = "UTCH2025";
$dbname = "user_app";

$con = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Error de conexion: " . $conn->connect_error);
}
?>
