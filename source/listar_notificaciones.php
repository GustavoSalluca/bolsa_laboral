<?php
include("../includes/head.php");
;
?>
<div class="container-fluid">

<?php
// Verifica si el usuario está autenticado
if (!isset($_SESSION['SESION_ID_USUARIO'])) {
    // Si no está autenticado, redirige a la página de inicio de sesión
    header("Location: form_login.php");
    exit();
}

// Agrega la conexión a la base de datos
include("../includes/conectar.php");
$conexion = conectar();

// Recupera el ID del usuario actual
$id_usuario = $_SESSION['SESION_ID_USUARIO'];

// Realiza una consulta para obtener las notificaciones del usuario
$query = "SELECT * FROM notificaciones WHERE id_usuario = $id_usuario";
$resultado = mysqli_query($conexion, $query);

// Verifica si la consulta fue exitosa
if ($resultado === false) {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
} else {
    // Verifica si hay notificaciones
    if (mysqli_num_rows($resultado) > 0) {
        // Muestra las notificaciones
        while ($fila = mysqli_fetch_assoc($resultado)) {
            // Card de Bootstrap para mostrar el mensaje de notificación
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Notificación</h5>';
            echo '<p class="card-text">' . $fila['mensaje'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No tienes notificaciones.";
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

</div><?php


include("../includes/foot.php");
?>
