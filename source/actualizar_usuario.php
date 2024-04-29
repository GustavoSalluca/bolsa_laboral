<?php
include("../includes/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió un ID válido
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        
        // Recuperar los datos del formulario
        $dni = $_POST['txt_dni'];
        $nombres = $_POST['txt_nombres'];
        $apellidos = $_POST['txt_apellidos'];
        $direccion = $_POST['txt_direccion'];
        $telefono = $_POST['txt_telefono'];

        // Manejar la carga de la nueva imagen
        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $ruta_destino = "ruta/del/directorio/"; // Ruta donde se guardarán las imágenes (ajusta según tu configuración)
            $nombre_archivo = uniqid('imagen_') . '_' . $_FILES['imagen']['name'];
            $ruta_imagen = $ruta_destino . $nombre_archivo;

            // Mover la imagen del directorio temporal al directorio de destino
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
                // La imagen se ha cargado correctamente, ahora puedes actualizar la ruta en la base de datos
                $conexion = conectar();
                $id = mysqli_real_escape_string($conexion, $id); // Evita inyección SQL
                $dni = mysqli_real_escape_string($conexion, $dni);
                $nombres = mysqli_real_escape_string($conexion, $nombres);
                $apellidos = mysqli_real_escape_string($conexion, $apellidos);
                $direccion = mysqli_real_escape_string($conexion, $direccion);
                $telefono = mysqli_real_escape_string($conexion, $telefono);
                $ruta_imagen = mysqli_real_escape_string($conexion, $ruta_imagen);

                $sql = "UPDATE usuarios SET dni='$dni', nombres='$nombres', apellidos='$apellidos', direccion='$direccion', telefono='$telefono', ruta_imagen='$ruta_imagen' WHERE id=$id";

                if (mysqli_query($conexion, $sql)) {
                    echo "Usuario actualizado correctamente.";
                } else {
                    echo "Error al actualizar usuario: " . mysqli_error($conexion);
                }

                // Cerrar la conexión
                mysqli_close($conexion);
            } else {
                echo "Error al cargar la imagen.";
            }
        } else {
            echo "No se ha enviado ninguna imagen nueva.";
        }
    } else {
        echo "ID de usuario no válido.";
    }
} else {
    echo "Solicitud no válida.";
}

header("location: listar_usuarios.php");
?>
