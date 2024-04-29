<?php

include("../includes/conectar.php");

$conexion = conectar();



//Recibimos datos del formulario
$dni = $_POST['txt_dni'];
$nombres = $_POST['txt_nombres'];
$apellidos = $_POST['txt_apellidos'];
$direccion = $_POST['txt_direccion'];
$telefono = $_POST['txt_telefono'];
$usuario = $_POST['txt_usuario'];
$contrasenia = $_POST['txt_contrasenia'];

/*
    echo "DNI recibido: ".$dni;
    echo "nombres recibido: ".$nombres;
    echo "apellidos recibido: ".$apellidos;
    echo "direccion recibido: ".$direccion;
    echo "telefono recibido: ".$telefono;
    */
//conexion a la DB
//gurdamos datos en tabla usuarios

$sql = "INSERT INTO usuarios (dni,nombres,apellidos,direccion,telefono,usuario,contrasenia,id_rol) VALUES('$dni','$nombres','$apellidos','$direccion','$telefono','$usuario','$contrasenia','0') ";

mysqli_query($conexion, $sql) or die("Error al guardar.");

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
