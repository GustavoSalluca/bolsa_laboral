<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>


<div class="container-fluid">

    <?php
    // Consulta para obtener todas las ofertas laborales
    $sql = "SELECT * FROM oferta_laboral ORDER BY id DESC";
    $resultado = mysqli_query($conexion, $sql);

    // Comprobar si hay resultados
    if (mysqli_num_rows($resultado) > 0) {
        $contador = 0; // Contador para controlar las tarjetas por fila
        while ($fila = mysqli_fetch_assoc($resultado)) {
            if ($contador % 4 == 0) {
                echo '<div class="row">'; // Inicia una nueva fila cada 4 tarjetas
            }
    ?>
            <div class="col-md-3 mb-4"> <!-- Crea una columna de 3 para cada tarjeta (12 columnas en total en un row) -->
                <div class="card">
                    <div class="card-header d-flex flex-row">
                        <span class="material-symbols-outlined mr-3 ">
                            work
                        </span>
                        <h4 class="font-weight-bold"><?php echo $fila['titulo']; ?></h4> <!-- Título más grande -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text"><?php echo $fila['descripcion']; ?></p>
                        <div class="row">
                            <div class="col">
                                <span class="material-symbols-outlined">
                                    calendar_today
                                </span>
                                <p><strong>Fecha de Publicación:</strong> <?php echo $fila['fecha_publicacion']; ?></p>
                                <p><strong>Fecha de Cierre:</strong> <?php echo $fila['fecha_cierre']; ?></p>
                            </div>
                            <div class="col">

                                <div class="d-flex flex-row pt-4">
                                    <span class="material-symbols-outlined">
                                        paid
                                    </span>
                                    <p><strong></strong> <?php echo $fila['remuneracion']; ?></p>

                                </div>
                                <div class="d-flex flex-row pt-4">
                                    <span class="material-symbols-outlined">
                                        pin_drop
                                    </span>
                                    <p><strong></strong> <?php echo $fila['ubicacion']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><strong><span class="material-symbols-outlined">
                                            home_work
                                        </span> </strong> <?php echo $fila['tipo']; ?></p>
                            </div>
                            <div class="col">
                                <p><strong><span class="material-symbols-outlined">
                                            group
                                        </span> </strong> <?php echo $fila['limite_postulantes']; ?></p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary">Postular</a>
                    </div>
                </div>
            </div>

    <?php
            $contador++;
            if ($contador % 4 == 0) {
                echo '</div>';
            }
        }
    } else {
        echo "No se encontraron ofertas laborales.";
    }
    ?>


</div>
</div>








<?php
include("../includes/foot.php");
?>