<?php
// Verificar si se han enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Limpiar y obtener los datos del formulario
    $id_cliente = $_POST["id_cliente"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $telefono = $_POST["telefono"];
    $fecha_alta = $_POST["fecha_alta"];

    // Consulta SQL para actualizar los datos del cliente
    $sql = "UPDATE cliente SET nomyape='$nombre', direccion='$direccion', ciudad='$ciudad', telefono='$telefono', f_alta='$fecha_alta' WHERE cod_cliente=$id_cliente";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar de vuelta al listado de clientes
        header("Location: listadoCliente.php");
        exit(); // Asegurar que el script se detiene después de la redirección
    } else {
        echo "Error al actualizar el cliente: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se han enviado datos mediante POST, redireccionar al listado de clientes
    header("Location: listadoCliente.php");
    exit();
}
?>