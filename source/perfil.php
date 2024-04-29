    <?php
    include("../includes/head.php");
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Inicio Zona central del sistema --> 
        <h1 class="mb-5">Mi perfil</h1>

        <?php
        // Verificar si el usuario ha iniciado sesión
        
        if(isset($_SESSION["SESION_ID_USUARIO"])) {
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
            if(mysqli_num_rows($resultado) > 0) {
                // Mostrar la información del usuario
                $fila = mysqli_fetch_assoc($resultado);
        ?>
                <div class="row">
                    <div class="col-md-4 text-center">
                    <div class="position-relative" id="profile-picture-container" style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%; margin: 0 auto; border: 2px solid #ccc;">
                        <img src="<?php echo $fila["ruta_imagen"]; ?>" alt="Imagen de perfil" style="width: 100%; height: auto;">
                    </div>
                        <p><?php echo $fila["nombres"] . " " . $fila["apellidos"]; ?></p>
                        <p><?php echo $fila["dni"]; ?></p>
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
                                    <td><?php echo "********"; ?></td> <!-- Mostrar asteriscos en lugar de la contraseña encriptada -->
                                </tr>
                                <tr>
                                    <td>
                                    <div class="mb-3">
                                    <strong>Subir CV</strong>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
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


