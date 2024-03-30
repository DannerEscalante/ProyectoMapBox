<?php
// Datos de la conexión a la base de datos
$servername = "207.244.255.46";
$username = "ratiosof74bo_uv_bd_user";
$password = "Estudiante@123";
$dbname = "ratiosof74bo_uv_bd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die(json_encode(array('error' => 'Conexión fallida: ' . $conn->connect_error)));
}

// Consulta SQL para obtener las coordenadas más recientes
$sql = "SELECT latitud, longitud FROM ubicacionesDanner ORDER BY hora DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos
    $row = $result->fetch_assoc();
    $latitud = $row["latitud"];
    $longitud = $row["longitud"];
    // Devolver las coordenadas como JSON
    echo json_encode(array('latitud' => $latitud, 'longitud' => $longitud));
} else {
    echo json_encode(array('error' => 'No se encontraron resultados'));
}
$conn->close();
?>
