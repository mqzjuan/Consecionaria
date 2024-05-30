<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Autos</title>
    <link rel="stylesheet" href="listado.css">
</head>
<body>
    <h2>Listado de Autos</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Precio de Venta</th>
                <th>Cliente</th>
                <th>Operacion</th>
                <th>Operacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion.php';
            $sql = "SELECT * 
                    FROM auto a 
                    INNER JOIN cliente c ON a.cod_cliente = c.cod_cliente";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['marca'] . "</td>";
                    echo "<td>" . $row['modelo'] . "</td>";
                    echo "<td>" . $row['color'] . "</td>";
                    echo "<td>" . $row['pventa'] . "</td>";
                    echo "<td>" . $row['nomyape'] . "</td>";
                    echo "<td><a href='modificarAu.php?id=" . $row["cod_auto"] . "'>Modificar</a></td>";
                    echo "<td><a href='eliminar.php?id=" . $row["cod_auto"] . "' onclick='return confirmarEliminar();'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay autos registrados</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <br>
        <a href="agregarAu.php" class="btn">Agregar Auto</a>
        <a href="../gestor.php" class="btn">Volver al Inicio</a> <!-- Ajusta la ruta según la ubicación real de 
</body>
</html>