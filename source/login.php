<?php
include("../includes/conectar.php");
$conexion = conectar();
session_start();

//recibimos los datos de usuario y contraseña

$usuario = $_POST['txt_usuario'];
$password = $_POST['txt_password'];

$sql="SELECT * FROM  usuarios WHERE usuario='$usuario' and contrasenia='$password' ";

$resultado = mysqli_query($conexion,$sql);

$numero_resultados = mysqli_affected_rows($conexion);

//echo "Se encontro".$numero_resultados."fil(s)";

if($numero_resultados==1){

    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION["SESION_ROL"]=$fila['id_rol'];
    $_SESSION["SESION_NOMBRES"]=$fila['nombre'];
    $_SESSION["SESION_APELLIDOS"]=$fila['apellidos'];

    header("Location:../index.php");

    
}else{
    header("Location:form_login.php?error_login=error");
}



?>