
<?php

session_start();
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

if (isset($_POST['login'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: formulario.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}

$conn->close();
?>