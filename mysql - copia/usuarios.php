<?php



$host = 'sql312.infinityfree.com  ';
$usuario = 'if0_37488457';
$contrasena = '';
$base_de_datos = 'if0_37488457_empresa  ';

// Conectar a la base de datos
$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre de usuario: " . $row["nombre_usuario"] . "<br>";
    }
} else {
    echo "No se encontraron usuarios en la tabla 'usuarios'.";
}

$conn->close();
?>