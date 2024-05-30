<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $pventa = $_POST['pventa'];
    $cod_cliente = $_POST['cod_cliente'];

    $sql = "INSERT INTO auto (marca, modelo, color, pventa, cod_cliente) VALUES ('$marca', '$modelo', '$color', '$pventa', '$cod_cliente')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Auto registrado exitosamente";
        header ("location:listadoAu.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>