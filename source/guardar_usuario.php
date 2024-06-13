<?php

include("../includes/conectar.php");

$conexion = conectar();

// Recibimos datos del formulario
$dni = $_POST['txt_dni'];
$nombres = $_POST['txt_nombres'];
$apellidos = $_POST['txt_apellidos'];
$direccion = $_POST['txt_direccion'];
$telefono = $_POST['txt_telefono'];
$usuario = $_POST['txt_usuario'];
$contrasenia = $_POST['txt_contrasenia'];



// Guardamos datos en tabla usuarios
$sql = "INSERT INTO usuarios (dni, nombres, apellidos, direccion, telefono, usuario, contrasenia, id_rol) 
        VALUES ('$dni', '$nombres', '$apellidos', '$direccion', '$telefono', '$usuario', '$contrasenia', '0')";

if (mysqli_query($conexion, $sql)) {
    session_start();

    // Redirección según el estado de inicio de sesión y el rol del usuario
    if (isset($_SESSION["SESION_ROL"])) {
        if ($_SESSION["SESION_ROL"] == '1') {
            header("location: listar_usuarios.php");
        } else {
            header("location: form_login.php");
        }
    } else {
        header("location: form_login.php");
    }
} else {
    echo "<script>alert('Error al guardar el usuario.'); window.history.back();</script>";
}

?>
