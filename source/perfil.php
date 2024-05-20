<?php
include("../includes/head.php");
?>

<!-- Incluir Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Inicio Zona central del sistema -->
    <h1 class="mb-5">Mi perfil</h1>

    <?php
    // Verificar si el usuario ha iniciado sesión
    if (isset($_SESSION["SESION_ID_USUARIO"])) {
        // Incluir el archivo de conexión a la base de datos
        include("../includes/conectar.php");
        // Establecer la conexión
        $conexion = conectar();

        // Obtener el ID del usuario de la sesión
        $id_usuario = $_SESSION["SESION_ID_USUARIO"];

        // Consulta SQL para obtener los datos del usuario
        $sql = "SELECT * FROM usuarios WHERE id = $id_usuario";
        $resultado = mysqli_query($conexion, $sql);

        // Verificar si se encontraron resultados
        if (mysqli_num_rows($resultado) > 0) {
            // Mostrar la información del usuario
            $fila = mysqli_fetch_assoc($resultado);

            // Calcular el porcentaje de información completada
            $totalCampos = 9;
            $camposCompletados = 0;

            if (!empty($fila["ruta_imagen"])) $camposCompletados++;
            if (!empty($fila["direccion"])) $camposCompletados++;
            if (!empty($fila["telefono"])) $camposCompletados++;
            if (!empty($fila["usuario"])) $camposCompletados++;
            if (!empty($fila["contrasenia"])) $camposCompletados++;
            if (!empty($fila["nombres"])) $camposCompletados++;
            if (!empty($fila["apellidos"])) $camposCompletados++;
            if (!empty($fila["dni"])) $camposCompletados++;
            if (!empty($fila["ruta_cv"])) $camposCompletados++;

            $porcentajeCompletado = ($camposCompletados / $totalCampos) * 100;
            $porcentajeFaltante = 100 - $porcentajeCompletado;
    ?>

            <!-- Gráfico de torta -->
            

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="position-relative mb-3" id="profile-picture-container" style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%; margin: 0 auto; border: 2px solid #ccc;">
                        <img src="<?php echo $fila["ruta_imagen"]; ?>" alt="Imagen de perfil" style="width: 100%; height: auto;">
                    </div>
                    <p><?php echo $fila["nombres"] . " " . $fila["apellidos"]; ?></p>
                    <p><?php echo $fila["dni"]; ?></p>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editarFotoModal">
                        Editar foto
                    </button>
                </div>

                <div class="modal fade" id="editarFotoModal" tabindex="-1" role="dialog" aria-labelledby="editarFotoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarFotoModalLabel">Editar Foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para cargar nueva imagen -->
                                <form action="guardar_imagen.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nuevaImagen">Seleccione una nueva imagen:</label>
                                        <input type="file" class="form-control-file" id="nuevaImagen" name="nuevaImagen">
                                    </div>
                                    <input type="hidden" name="idUsuario" value="<?php echo $fila['id']; ?>">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Dirección:</strong></td>
                                <td><?php echo $fila["direccion"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Teléfono:</strong></td>
                                <td><?php echo $fila["telefono"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Usuario:</strong></td>
                                <td><?php echo $fila["usuario"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Contraseña:</strong></td>
                                <td><?php echo "********"; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- Botón para abrir el modal -->
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#subirArchivoModal">
                                        Subir Archivo
                                    </button>

                                    <!-- Modal para subir archivo -->
                                    <div class="modal fade" id="subirArchivoModal" tabindex="-1" role="dialog" aria-labelledby="subirArchivoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="subirArchivoModalLabel">Subir Archivo</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulario para cargar nueva imagen -->
                                                    <form action="guardar_cv.php" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="nuevoDocumento">Seleccione un archivo:</label>
                                                            <input type="file" class="form-control-file" id="nuevoDocumento" name="nuevoDocumento">
                                                        </div>
                                                        <input type="hidden" name="idUsuario" value="<?php echo $fila['id']; ?>">
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="d-flex justify-content-end mb-3">
                        <a href="editar_usuario.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning">Editar Usuario</a>
                    </div>
                        </tbody>
                    </table>
                    
                    
                </div>
                
            </div>
            <div class="mt-4">
                <canvas id="perfilCompletoChart"></canvas>
            </div>
    <?php
        } else {
            echo "No se encontraron datos para este usuario.";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    } else {
        // Si no hay sesión iniciada, redireccionar al formulario de inicio de sesión
        header("Location: form_login.php");
        exit; // Detener la ejecución del script para evitar que se muestre el resto del contenido de la página
    }
    ?>

    <!-- Fin Zona central del sistema -->

</div>
<!-- /.container-fluid -->

<?php
include("../includes/foot.php");
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuración del gráfico de tipo "torta"
        var ctx = document.getElementById('perfilCompletoChart').getContext('2d');
        var perfilCompletoChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Completado', 'Faltante'],
                datasets: [{
                    data: [<?php echo $porcentajeCompletado; ?>, <?php echo $porcentajeFaltante; ?>],
                    backgroundColor: ['#4CAF50', '#FFC107']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    });
</script>
