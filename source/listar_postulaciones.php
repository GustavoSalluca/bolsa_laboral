<?php
include("../includes/head.php");
include("../includes/conectar.php");


if(isset($_SESSION['SESION_ID_USUARIO'])) {
    $conexion = conectar();
    $id_usuario = $_SESSION['SESION_ID_USUARIO'];

    // Consulta para obtener las postulaciones del usuario actual
    $query = "SELECT postulaciones.*, oferta_laboral.titulo AS titulo_oferta 
    FROM postulaciones 
    INNER JOIN oferta_laboral ON postulaciones.id_oferta = oferta_laboral.id 
    WHERE postulaciones.id_usuario = $id_usuario";
    $resultado = mysqli_query($conexion, $query);
}
?>

  <!-- Contenido de la página -->
  <div class="container-fluid ">
        <h2>Mis Postulaciones</h2>
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($resultado) && mysqli_num_rows($resultado) > 0) {
                    echo '<table class="table table-success table-hover">';
                    echo '<thead><tr><th>Trabajo</th><th>Estado</th><th>Fecha de Postulación</th></tr></thead>';
                    echo '<tbody>';
                    while($postulacion = mysqli_fetch_assoc($resultado)) {
                        // Aquí muestras la información de cada postulación en filas de la tabla
                        echo "<tr>";
                        echo "<td>".$postulacion['titulo_oferta']."</td>";
                        echo "<td>".$postulacion['estado_actual']."</td>";
                        echo "<td>".$postulacion['fecha_hora_postulacion']."</td>";
                        echo "</tr>";
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "No has realizado ninguna postulación.";
                }
                
                ?>

            </div>
        </div>
    </div>
