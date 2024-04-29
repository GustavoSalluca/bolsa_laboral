<?php
include("../includes/conectar.php");
$conexion = conectar();

$id = $_REQUEST['id'];

$conexion = conectar();

$sql = "UPDATE usuarios SET id_rol = '3' WHERE id=$id";

mysqli_query($conexion, $sql);

header("Location: listar_usuarios.php");
