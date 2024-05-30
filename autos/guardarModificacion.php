<?php
// Verificar si se han enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Limpiar y obtener los datos del formulario
   
    $id_auto  = $_POST["id_auto"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $pventa = $_POST["pventa"];
    $cod_cliente  = $_POST["cod_cliente"];

    // Consulta SQL para actualizar los datos del cliente
    $sql = "UPDATE auto SET marca='$marca', modelo='$modelo', color='$color', pventa='$pventa', cod_cliente='$cod_cliente' WHERE id_auto =$id_auto ";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar de vuelta al listado de clientes
        header("Location: listadoAu.php");
        exit(); // Asegurar que el script se detiene después de la redirección
    } else {
        echo "Error al actualizar el auto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se han enviado datos mediante POST, redireccionar al listado de clientes
    header("Location: listadoAu.php");
    exit();
}
?>