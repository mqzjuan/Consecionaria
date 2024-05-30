<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Concesionaria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bienvenido al Gestor de Concesionaria</h1>
    <p>Esta es una herramienta para gestionar clientes, autos y las operaciones del concesionario.</p>
    <button onclick="location.href='gestorCliente.php'">Gestor de Cliente</button>
    <button onclick="location.href='gestorAuto.php'">Gestor de Auto</button>
    <button onclick="location.href='gestorRevision.php'">Gestor de Revisiones</button>
</body>
</html>