<?php
include("../includes/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió un ID válido
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        
        // Recuperar los datos del formulario
        $ruc = $_POST['txt_ruc'];
        $razon_social = $_POST['txt_razon_social'];
        $correo = $_POST['txt_correo'];
        $direccion = $_POST['txt_direccion'];
        $telefono = $_POST['txt_telefono'];

        // Actualizar los datos del usuario en la base de datos
        $conexion = conectar();
        $id = mysqli_real_escape_string($conexion, $id); // Evita inyección SQL
        $ruc = mysqli_real_escape_string($conexion, $ruc);
        $razon_social = mysqli_real_escape_string($conexion, $razon_social);
        $correo = mysqli_real_escape_string($conexion, $correo);
        $direccion = mysqli_real_escape_string($conexion, $direccion);
        $telefono = mysqli_real_escape_string($conexion, $telefono);
        
        $sql = "UPDATE empresa SET ruc='$ruc', razon_social='$razon_social', correo='$correo', direccion='$direccion', telefono='$telefono' WHERE id=$id";

        if (mysqli_query($conexion, $sql)) {
            echo "Empresa actualizado correctamente.";
        } else {
            echo "Error al actualizar Empresa: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    } else {
        echo "ID de empresa no válido.";
    }
} else {
    echo "Solicitud no válida.";
}

header("location: listar_empresas.php");
?>
