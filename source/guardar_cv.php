<?php
session_start();

if (isset($_SESSION["SESION_ID_USUARIO"])) {
    include("../includes/conectar.php");
    $conexion = conectar();

    $id_usuario = $_SESSION["SESION_ID_USUARIO"];

    if ($_FILES['nuevoDocumento']['error'] === UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES['nuevoDocumento']['tmp_name'];
        $nombre_archivo = $_FILES['nuevoDocumento']['name'];
        $ruta_destino = "../document/" . $nombre_archivo;

        if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
            $sql = "UPDATE usuarios SET ruta_cv = '$ruta_destino' WHERE id = $id_usuario";
            mysqli_query($conexion, $sql);
            header("Location: perfil.php");
        } else {
            echo "Error al subir el documento.";
        }
    } else {
        echo "Error al subir el documento.";
    }

    mysqli_close($conexion);
} else {
    header("Location: form_login.php");
    exit;
}

