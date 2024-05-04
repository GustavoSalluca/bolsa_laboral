<?php
// Incluye el archivo de conexión a la base de datos
include("../includes/conectar.php");
$conexion = conectar();

if (isset($_POST['idUsuario'])) {
    $idUsuario = $_POST['idUsuario'];
    $mensaje = "¡Felicidades! Has sido seleccionado para el puesto de trabajo.";
    $fechaCreacion = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual

    // Inserta la notificación en la base de datos
    $query = "INSERT INTO notificaciones (id_usuario, mensaje, fecha_creacion) VALUES ('$idUsuario', '$mensaje', '$fechaCreacion')";
    $resultado = mysqli_query($conexion, $query);

    // Verifica si la inserción fue exitosa
    if ($resultado) {
        echo "Notificación enviada con éxito.";
    } else {
        echo "Error al enviar la notificación: " . mysqli_error($conexion);
    }
} else {
    echo "ID de usuario no especificado.";
}

