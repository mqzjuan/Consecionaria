<?php
// Verificar si se ha enviado el ID del cliente a modificar
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Limpiar y obtener el ID del cliente a modificar
    $id_auto = $_GET["id"];

    // Consulta SQL para obtener los datos del cliente seleccionado
    $sql = "SELECT * FROM auto WHERE cod_auto = $id_auto";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Obtener los datos del cliente
        $auto = $result->fetch_assoc();
        $marca = $auto["marca"];
        $modelo = $auto["modelo"];
        $color = $auto["color"];
        $pventa = $auto["pventa"];
        $cod_cliente  = $auto["cod_cliente"];
    } else {
        // Si no se encuentra el auto, redireccionar al listado de autos
        header("Location: listadoAu.php");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporciona un ID de auto válido, redireccionar al listado de autos
    header("Location: listadoAu.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Auto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Modificar Auto</h2>
    
    <form method="post" action="guardarModificacion.php">
        <input type="hidden" name="id_auto" value="<?php echo $id_auto; ?>">
        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca" value="<?php echo $marca; ?>" required><br>

        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo" value="<?php echo $modelo; ?>" required><br>
        
        <label for="pventa">Precio de Venta:</label><br>
        <input type="number" id="pventa" name="pventa" value="<?php echo $pventa; ?>" required><br>
        <br>
        <label for="cod_cliente">Cliente:</label><br>
        <select id="cod_cliente" name="cod_cliente">
            <?php
            include 'conexion.php';
            $sql = "SELECT * FROM cliente";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['cod_cliente'] . "'>" . $row['nomyape'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay clientes registrados</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Guardar Modificación</button>
    </form>
</body>
</html>