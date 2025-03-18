<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Por defecto, la contraseña es vacía en XAMPP
$dbname = "contacto_dental";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar todas las solicitudes de la base de datos
$sql = "SELECT * FROM solicitudes ORDER BY fecha_envio DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes Recibidas</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Si tienes algún estilo -->
</head>
<body>

    <h1>Solicitudes Recibidas</h1>

    <?php
    // Comprobar si hay resultados
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Teléfono</th><th>Correo Electrónico</th><th>Servicio</th><th>Fecha</th><th>Hora</th><th>Fecha de Envío</th></tr>";

        // Mostrar los datos de cada solicitud
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['nombre'] . "</td>
                    <td>" . $row['telefono'] . "</td>
                    <td>" . $row['correo_electronico'] . "</td>
                    <td>" . $row['servicio'] . "</td>
                    <td>" . $row['fecha'] . "</td>
                    <td>" . $row['hora'] . "</td>
                    <td>" . $row['fecha_envio'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay solicitudes registradas.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

</body>
</html>
