<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registrar Cliente</h2>
    <form method="post" action="registrarCliente.php">
    <label for="nombre">Nombre y apellido:</label><br>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="direccion">Dirección:</label><br>
    <input type="text" id="direccion" name="direccion" required><br>
    
    <label for="ciudad">Ciudad:</label><br>
    <select id="ciudad" name="ciudad" required>
        <option value="Rio Grande">Rio Grande</option>
        <option value="Ushuaia">Ushuaia</option>
        <option value="Tolhuin">Tolhuin</option>
    </select><br>
    
    <label for="telefono">Teléfono:</label><br>
    <input type="tel" id="telefono" name="telefono" required><br>

    <label for="fecha_alta">Fecha de Alta:</label><br>
    <input type="date" id="fecha_alta" name="fecha_alta" required><br><br>
    
    <button type="submit">Registrar Cliente</button>
</form>

</body>
</html>