<?php
include("../includes/conectar.php");
$conexion = conectar();

?>
<div class="container-fluid">

<?php
if(isset($_GET['id_oferta'])) {
    $id_oferta = $_GET['id_oferta'];

    echo "<script> var idOferta = $id_oferta; </script>";
    
    $query = "SELECT u.id, u.nombres, u.apellidos, u.dni, u.telefono, u.direccion, u.ruta_cv FROM postulaciones p INNER JOIN usuarios u ON p.id_usuario = u.id WHERE p.id_oferta = $id_oferta";
    $result = mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($result) > 0) {

        ?>
        <h1>Informacion Postulantes</h1>

        <?php
        // Construye la tabla de usuarios
        $tablaUsuarios = "<table class='table table-success table-hover'><tr><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Teléfono</th><th>Dirección</th><th>CV</th><th>Calificar</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $tablaUsuarios .= "<tr>";
            $tablaUsuarios .= "<td>".$row['nombres']."</td>";
            $tablaUsuarios .= "<td>".$row['apellidos']."</td>";
            $tablaUsuarios .= "<td>".$row['dni']."</td>";
            $tablaUsuarios .= "<td>".$row['telefono']."</td>";
            $tablaUsuarios .= "<td>".$row['direccion']."</td>";
            $tablaUsuarios .= "<td><a href='".$row['ruta_cv']."' class='btn btn-primary' download>Descargar</a></td>";
            // Agrega los botones Aceptar y Descalificar
            $tablaUsuarios .= "<td><button class='btn btn-success' onclick='calificarUsuario(".$row['id'].", idOferta, true)'>Aceptar</button> <button class='btn btn-danger' onclick='calificarUsuario(".$row['id'].", idOferta, false)'>Descalificar</button></td>";
            $tablaUsuarios .= "</tr>";
        }
        $tablaUsuarios .= "</table>";
        
        echo $tablaUsuarios;
    } else {
        echo "<p>No hay usuarios que hayan postulado a esta oferta.</p>";
    }
} else {
    echo "<p>Error: ID de oferta no especificado.</p>";
}


?>
</div>

<script>
// Función para calificar un usuario
function calificarUsuario(idUsuario, idOferta, aceptado) {
    // Aquí puedes agregar la lógica para calificar al usuario según el valor de la variable aceptado
    // Por ejemplo, puedes hacer una solicitud AJAX para actualizar la base de datos
    // y luego mostrar un mensaje al usuario si ha sido aceptado
    if (aceptado) {
        // Si el usuario ha sido aceptado, muestra un mensaje
        alert("¡Felicidades! Has sido seleccionado para el puesto de trabajo.");
        
        // Envía una notificación al usuario
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "notificaciones.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send("idUsuario=" + idUsuario + "&idOferta=" + idOferta);
    } else {
        // Si el usuario ha sido descalificado, muestra un mensaje
        alert("Lo sentimos, no has sido seleccionado para el puesto de trabajo.");
    }
}

</script>
