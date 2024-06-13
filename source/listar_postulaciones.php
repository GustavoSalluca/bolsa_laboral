<?php
include("../includes/head.php");
include("../includes/conectar.php");

if (isset($_SESSION['SESION_ID_USUARIO'])) {
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
            if (isset($resultado) && mysqli_num_rows($resultado) > 0) {
                echo '<table class="table table-success table-hover">';
                echo '<thead><tr><th>Trabajo</th><th>Estado</th><th>Fecha de Postulación</th><th>Acciones</th></tr></thead>';
                echo '<tbody>';
                while ($postulacion = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>".$postulacion['titulo_oferta']."</td>";
                    echo "<td id='estado_".$postulacion['id']."'>".$postulacion['estado_actual']."</td>";
                    echo "<td>".$postulacion['fecha_hora_postulacion']."</td>";
                    echo "<td>";
                    if ($postulacion['estado_actual'] == 'abierto') {
                        echo '<form method="post" action="cancelar_postulacion.php" onsubmit="return cancelarPostulacion(event, '.$postulacion['id'].')">';
                        echo '<input type="hidden" name="id_postulacion" value="'.$postulacion['id'].'">';
                        echo '<button type="submit" id="btn_cancelar_'.$postulacion['id'].'" class="btn btn-danger">Cancelar</button>';
                        echo '</form>';
                    } else {
                        echo '<button class="btn btn-secondary" disabled>Cancelado</button>';
                    }
                    echo "</td>";
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

<?php include("../includes/foot.php"); ?>

<script>
function cancelarPostulacion(event, id_postulacion) {
    event.preventDefault();
    var form = event.target;
    
    fetch(form.action, {
        method: form.method,
        body: new FormData(form)
    }).then(response => response.text())
    .then(data => {
        if (data.includes("success")) {
            document.getElementById('estado_' + id_postulacion).innerText = 'cancelado';
            var btnCancelar = document.getElementById('btn_cancelar_' + id_postulacion);
            btnCancelar.innerText = 'Cancelado';
            btnCancelar.classList.remove('btn-danger');
            btnCancelar.classList.add('btn-secondary');
            btnCancelar.disabled = true;
        } else {
            alert('Error al cancelar la postulación.');
        }
    });
}
</script>
