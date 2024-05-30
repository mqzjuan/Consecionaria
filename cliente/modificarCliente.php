<?php
// Verificar si se ha enviado el ID del cliente a modificar
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Limpiar y obtener el ID del cliente a modificar
    $id_cliente = $_GET["id"];

    // Consulta SQL para obtener los datos del cliente seleccionado
    $sql = "SELECT * FROM cliente WHERE cod_cliente = $id_cliente";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Obtener los datos del cliente
        $cliente = $result->fetch_assoc();
        $nombre = $cliente["nomyape"];
        $direccion = $cliente["direccion"];
        $ciudad = $cliente["ciudad"];
        $telefono = $cliente["telefono"];
        $fecha_alta = $cliente["f_alta"];
    } else {
        // Si no se encuentra el cliente, redireccionar al listado de clientes
        header("Location: listadoCliente.php");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporciona un ID de cliente válido, redireccionar al listado de clientes
    header("Location: listadoCliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Modificar Cliente</h2>
    
    <form method="post" action="guardarModificacion.php">
        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
        <label for="nombre">Nombre y Apellido:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" required><br>
        
        <label for="direccion">Ciudad:</label><br>
        <select id="ciudad" name="ciudad" required>
            <option value="Rio Grande" <?php if ($cliente['ciudad'] == 'Rio Grande') echo 'selected'; ?>>Rio Grande</option>
            <option value="Ushuaia" <?php if ($cliente['ciudad'] == 'Ushuaia') echo 'selected'; ?>>Ushuaia</option>
            <option value="Tolhuin" <?php if ($cliente['ciudad'] == 'Tolhuin') echo 'selected'; ?>>Tolhuin</option>
        </select><br>
        
        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required><br>

        <label for="fecha_alta">Fecha de Alta:</label><br>
        <input type="date" id="fecha_alta" name="fecha_alta" value="<?php echo $fecha_alta; ?>" required><br><br>
        
        <button type="submit">Guardar Modificación</button>
    </form>
</body>
</html>