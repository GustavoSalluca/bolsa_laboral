<?php

include("../includes/conectar.php");

$conexion = conectar();
session_start();

//Recibimos datos del formulario



$titulo = $_POST['txt_titulo'];
$descripcion = $_POST['txt_descripcion'];
$fecha_publicacion = date('Y-m-d', strtotime($_POST['txt_fecha_publicacion'])); // Convertir la fecha al formato deseado
$fecha_cierre = date('Y-m-d', strtotime($_POST['txt_fecha_cierre']));
$remuneracion = $_POST['txt_remuneracion'];
$ubicacion = $_POST['txt_ubicacion'];
$tipo = $_POST['txt_tipo'];
$limite_postulantes = $_POST['txt_limite_postulantes'];

$id_empresa = $_SESSION["SESION_ID_EMPRESA"];

$sql = "INSERT INTO oferta_laboral (titulo, descripcion, fecha_publicacion, fecha_cierre, remuneracion, ubicacion, tipo, limite_postulantes, id_empresa) 
                VALUES ('$titulo', '$descripcion', '$fecha_publicacion', '$fecha_cierre', '$remuneracion', '$ubicacion', '$tipo', '$limite_postulantes', '$id_empresa')";

mysqli_query($conexion, $sql) or die("Error al guardar.");

header("location: listar_ofertas.php");
