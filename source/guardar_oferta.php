<?php

    include("../includes/conectar.php");

    $conexion = conectar();

    session_start();
    $id_empresa = $_SESSION['id_empresa'];

    //Recibimos datos del formulario
    
    $titulo = $_POST['txt_titulo'];
    $descripcion = $_POST['txt_descripcion'];
    $fecha_publicacion = $_POST['txt_fecha_publicacion'];
    $fecha_cierre = $_POST['txt_fecha_cierre'];
    $remuneracion = $_POST['txt_remuneracion'];
    $ubicacion = $_POST['txt_ubicacion'];
    $tipo = $_POST['txt_tipo'];
    $limite_postulantes = $_POST['txt_limite_postulantes'];
  

    /*
    echo "DNI recibido: ".$dni;
    echo "nombres recibido: ".$nombres;
    echo "apellidos recibido: ".$apellidos;
    echo "direccion recibido: ".$direccion;
    echo "telefono recibido: ".$telefono;
    */
    //conexion a la DB
    //gurdamos datos en tabla usuarios

   $sql = "INSERT INTO oferta_laboral (titulo, descripcion, fecha_publicacion, fecha_cierre, remuneracion, ubicacion, tipo, limite_postulantes, id_empresa) 
        VALUES ('$titulo', '$descripcion', '$fecha_publicacion', '$fecha_cierre', '$remuneracion', '$ubicacion', '$tipo', '$limite_postulantes', '$id_empresa')";


    mysqli_query($conexion,$sql) or die("Error al guardar.");
    
    header("location: listar_ofertas.php");

?>