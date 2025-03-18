<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "contacto_dental";

$conn = new mysqli( $servername, $username, $password, $dbname);

if ( $conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $servicio = $_POST['servicio'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $sql = "INSERT INTO solicitudes (nombre, telefono, correo_electronico, servicio, fecha, hora)
            VALUES ('$nombre', '$telefono', '$correo', '$servicio', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        echo "Solicitud enviada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
.