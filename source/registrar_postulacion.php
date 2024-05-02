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
        
        header("Location: listar_postulaciones.php");
    } else {
        echo "<script>alert('Error al intentar postularse.');</script>";
    }
}
?>
