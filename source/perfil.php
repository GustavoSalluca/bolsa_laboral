    <?php
    include("../includes/head.php");
    ?>

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
        ?>
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
                                        <strong>Subir CV</strong>
                                        <input class="form-control" type="file" id="formFile">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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