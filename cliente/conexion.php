<?php
$servername = "localhost"; // Servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos (por defecto en XAMPP es 'root')
$password = ""; // Contraseña del usuario de la base de datos (por defecto en XAMPP es vacío)
$dbname = "consecionaria"; // Nombre de la base de datos

// Crear conexión usando mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); // Si hay un error en la conexión, se muestra un mensaje de error y se detiene el script
}
?>