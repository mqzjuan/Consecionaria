<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Obtener y limpiar los datos del formulario
    $nombre = limpiarDatos($_POST["nombre"]);
    $direccion = limpiarDatos($_POST["direccion"]);
    $ciudad = limpiarDatos($_POST["ciudad"]);
    $telefono = limpiarDatos($_POST["telefono"]);
    $fecha_alta = limpiarDatos($_POST["fecha_alta"]);

    // Preparar la consulta SQL para insertar datos en la tabla cliente
    $sql = "INSERT INTO cliente (nomyape, direccion, ciudad, telefono, f_alta) 
            VALUES ('$nombre', '$direccion', '$ciudad', '$telefono', '$fecha_alta')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente registrado correctamente.";
        header ("location:listadoCliente.php");
    } else {
        echo "Error al registrar el cliente: " . $conn->error;
    }
}

// Función para limpiar los datos
function limpiarDatos($datos) {
    global $conn;
    $datos = trim($datos); // Eliminar espacios en blanco al inicio y al final
    $datos = stripslashes($datos); // Eliminar barras invertidas
    $datos = htmlspecialchars($datos); // Convertir caracteres especiales en entidades HTML
    return $conn->real_escape_string($datos); // Evitar inyección de SQL
}
?>