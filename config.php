<?php
// config.php - Configuración de la base de datos
$servername = "localhost";
$username = "usuario_db"; // Cambia esto por tu usuario de base de datos
$password = "password_db"; // Cambia esto por tu contraseña de base de datos
$dbname = "user_app";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
