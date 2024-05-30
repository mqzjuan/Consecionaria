<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="listado.css">
</head>
<body>
    <h2>Listado de Clientes</h2>
    
    <?php
    // Incluir el archivo de conexión
    include 'conexion.php';

    // Consulta SQL para obtener todos los clientes
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                    <th>Nombre y Apellido</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th>Fecha de Alta</th>
                    <th>Modificar Cliente</th>
                    <th>Eliminar Cliente</th>
        </tr>";
        // Salida de datos de cada fila
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nomyape"] . "</td>";
            echo "<td>" . $row["direccion"] . "</td>";
            echo "<td>" . $row["ciudad"] . "</td>";
            echo "<td>" . $row["telefono"] . "</td>";
           // Convertir la fecha a dd/mm/yyyy
            $fecha_alta = date("d/m/Y", strtotime($row["f_alta"]));
            echo "<td>" . $fecha_alta . "</td>";
            // Agregar enlaces para modificar y e   liminar
            echo "<td><a href='modificarCliente.php?id=" . $row["cod_cliente"] . "'>Modificar</a></td>";
            echo "<td><a href='eliminarCliente.php?id=" . $row["cod_cliente"] . "' onclick='return confirmarEliminar();'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay clientes registrados.";
    }
    // Cerrar la conexión
    $conn->close();
    ?>
    <br>
        <a href="agregarCliente.php" class="btn">Agregar cliente</a>
        <a href="../gestor.php" class="btn">Volver al Inicio</a> <!-- Ajusta la ruta según la ubicación real de tu archivo de inicio -->
    <script>
        function confirmarEliminar() {
            return confirm("¿Estás seguro de que deseas eliminar este cliente?");
        }
    </script>
    
</body>
</html>