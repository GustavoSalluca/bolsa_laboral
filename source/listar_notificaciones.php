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

$query = "SELECT n.*, o.titulo AS titulo_oferta 
          FROM notificaciones n 
          INNER JOIN oferta_laboral o ON n.id_oferta = o.id 
          WHERE n.id_usuario = $id_usuario";
$resultado = mysqli_query($conexion, $query);

// Verifica si la consulta fue exitosa
if ($resultado === false) {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
} else {
    // Verifica si hay notificaciones
    if (mysqli_num_rows($resultado) > 0) {
        // Contador para controlar el número de tarjetas por fila
        $contador = 0;

        // Muestra las notificaciones
        while ($fila = mysqli_fetch_assoc($resultado)) {
            // Si el contador es cero, comienza una nueva fila
            if ($contador == 0) {
                echo '<div class="row">';
            }

            // Card de Bootstrap para mostrar el mensaje de notificación
            echo '<div class="col-md-4">';
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Notificación</h5>';
            echo '<p class="card-text">' . $fila['mensaje'] . ' - ' .  $fila['titulo_oferta'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            // Incrementa el contador
            $contador++;

            // Si el contador alcanza tres, cierra la fila y reinicia el contador
            if ($contador == 3) {
                echo '</div>'; // Cierra la fila
                $contador = 0; // Reinicia el contador
            }
        }

        // Si el contador no es cero al salir del bucle, cierra la fila
        if ($contador != 0) {

        }
    } else {
        echo "No tienes notificaciones.";
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

</div>

<?php
include("../includes/foot.php");
?>
