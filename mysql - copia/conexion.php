<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.html");
    exit();
}

$host = 'sql312.infinityfree.com  ';
$nombre_usuario = 'if0_37488457';
$contrasena = '';
$base_de_datos = 'if0_37488457_empresa  ';

// Conectar a la base de datos
$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO empresa (nombre, puesto) VALUES ('$nombre', '$puesto')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro guardado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>