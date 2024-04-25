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

    $sql = "INSERT INTO usuarios (dni,nombres,apellidos,direccion,telefono,usuario,contrasenia) VALUES('$dni','$nombres','$apellidos','$direccion','$telefono','$usuario','$contrasenia') ";

    mysqli_query($conexion,$sql) or die("Error al guardar.");
    
    header("location: listar_usuarios.php");

?>