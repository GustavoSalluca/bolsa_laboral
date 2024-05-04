<?php
include("../includes/conectar.php");
$conexion = conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postular'])) {
    // Obtener el ID del usuario de la sesión
    $id_usuario = $_POST['id_usuario'];
    $id_oferta = $_POST['id_oferta'];
    $fecha_hora_postulacion = date('Y-m-d H:i:s'); // Obtener fecha y hora actual

    // Insertar los datos en la tabla de postulaciones
    $sql_insert = "INSERT INTO postulaciones (id_usuario, id_oferta, fecha_hora_postulacion, estado_actual) VALUES ('$id_usuario', '$id_oferta', '$fecha_hora_postulacion', 'abierto')";
    if(mysqli_query($conexion, $sql_insert)) {
        // Reducir el límite de postulantes en la oferta laboral correspondiente
        $sql_update_limite = "UPDATE oferta_laboral SET limite_postulantes = limite_postulantes - 1 WHERE id = '$id_oferta'";
        if(mysqli_query($conexion, $sql_update_limite)) {
            // Redireccionar después de una postulación exitosa
            header("Location: listar_postulaciones.php");
        } else {
            echo "<script>alert('Error al intentar postularse.');</script>";
        }
    } else {
        echo "<script>alert('Error al intentar postularse.');</script>";
    }
}

