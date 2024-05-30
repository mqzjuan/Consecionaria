<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Auto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registrar Nuevo Auto</h2>
    <form method="post" action="registrarAu.php">
        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca" required><br>
        
        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo" required><br>
        
        <label for="color">Color:</label><br>
        <input type="text" id="color" name="color" required><br>
        
        <label for="pventa">Precio de Venta:</label><br>
        <input type="number" id="pventa" name="pventa" required><br>

        <br><label for="cod_cliente">Cliente:</label>
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
        
        <button type="submit">Registrar Auto</button>
    </form>
</body>
</html>