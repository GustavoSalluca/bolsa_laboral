<?php
include("../includes/conectar.php");
$conexion = conectar();

// Consulta para obtener todas las ofertas laborales
$sql = "SELECT * FROM oferta_laboral";
$resultado = mysqli_query($conexion, $sql);

// Comprobar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
?>
        <div class="card">
            <div class="card-header">
                <?php echo $fila['titulo']; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Descripción</h5>
                <p class="card-text"><?php echo $fila['descripcion']; ?></p>
                <p class="card-text"><strong>Fecha de Publicación:</strong> <?php echo $fila['fecha_publicacion']; ?></p>
                <p class="card-text"><strong>Fecha de Cierre:</strong> <?php echo $fila['fecha_cierre']; ?></p>
                <p class="card-text"><strong>Remuneración:</strong> <?php echo $fila['remuneracion']; ?></p>
                <p class="card-text"><strong>Ubicación:</strong> <?php echo $fila['ubicacion']; ?></p>
                <p class="card-text"><strong>Tipo:</strong> <?php echo $fila['tipo']; ?></p>
                <p class="card-text"><strong>Límite de Postulantes:</strong> <?php echo $fila['limite_postulantes']; ?></p>
                <a href="#" class="btn btn-primary">Postular</a>
            </div>
        </div>
        <br>
<?php
    }
} else {
    echo "No se encontraron ofertas laborales.";
}
?>
