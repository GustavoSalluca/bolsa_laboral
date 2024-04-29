<?php
include("../includes/conectar.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el usuario de la base de datos
    $conexion = conectar();
    $id = mysqli_real_escape_string($conexion, $id); // Evita inyección SQL
    $sql = "DELETE FROM oferta_laboral WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Oferta eliminado correctamente.";
    } else {
        echo "Error al eliminar oferta.";
    }
} else {
    echo "ID de oferta no especificado.";
    exit();
}
header("location: listar_ofertas.php");
