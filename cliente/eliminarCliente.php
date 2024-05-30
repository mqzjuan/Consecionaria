<?php
// Verificar si se ha enviado el ID del cliente a eliminar
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Limpiar y obtener el ID del cliente a eliminar
    $id_cliente = $_GET["id"];

    // Consulta SQL para eliminar el cliente
    $sql = "DELETE FROM cliente WHERE cod_cliente = $id_cliente";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar de vuelta al listado de clientes
        header("Location: listadoCliente.php");
        exit(); // Asegurar que el script se detiene después de la redirección
    } else {
        echo "Error al eliminar el cliente: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporciona un ID de cliente válido, redireccionar de vuelta al listado de clientes
    header("Location: listadoCliente.php");
    exit();
}
?>