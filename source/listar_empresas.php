<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion=conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Inicio Zona  central del sistema  -->
    <h1>Lista de empresas</h1>
    

    <?php

        $sql="SELECT * FROM empresa";
        $registros=mysqli_query($conexion,$sql);

        echo "<table class='table table-primary table-hover'>";

        echo "<th>Razon Social</th>";
        echo "<th>RUC</th>";
        echo "<th>Correo</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "<th>Acciones</th>";

        while($fila = mysqli_fetch_array($registros)){
            echo "<tr>";
                echo "<td>".$fila['razon_social']."</td>";
                echo "<td>".$fila['ruc']."</td>";
                echo "<td>".$fila['correo']."</td>";
                echo "<td>".$fila['direccion']."</td>";
                echo "<td>".$fila['telefono']."</td>";

                echo "<td>";
                    ?>
                    <button type="button" class="btn btn-warning"  onclick="editarEmpresa('<?php echo $fila['id']; ?>')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg> Editar</button> 
                    <button type="button" class="btn btn-danger" onclick="eliminarEmpresa(<?php echo $fila['id']; ?>)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg> Eliminar</button>
<button type="button" class="btn btn-success" onclick="Mostrar_usuarios(<?php echo $fila['id']; ?>)"> Asignar Usuario</button>

                    

                    <?php
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>

    <!-- Fin Zona  central del sistema  -->

</div>

    <div id="div_usuarios">
        <h1>Lista de usuarios</h1>
        <?php
        $sql_usuarios = "SELECT * FROM usuarios";
        $registros_usuarios = mysqli_query($conexion, $sql_usuarios);

        while ($fila_user = mysqli_fetch_array($registros_usuarios)) {
            echo '<div>';
            echo '<span style="color:black;">'.$fila_user['dni'] . ' ' . $fila_user['nombres'] . ' ' . $fila_user['apellidos'] . '</span>';
            // Verificar si el usuario está asignado a una empresa
            if ($fila_user['id_empresa'] !== NULL) {
                // Si el usuario está asignado, mostrar un mensaje en rojo
                echo '<span style="color:red; "> (Ya asignado)</span>';
            } else {
                // Si el usuario no está asignado, mostrar un enlace o botón para asignarlo
                echo ' <a href="#" onclick="asignarUsuario('.$fila_user['id'].')">Asignar</a>';
            }
            echo '</div>';
        }
        ?>
    </div>  


<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>



<script>

    var ID_EMPRESA;

$(document).ready(function(){//inicio jquery
        $("#div_usuarios").dialog({
            width: 600,
            height: 400,
            title:"Lista de Usuarios...",
        });
        $("#div_usuarios").dialog("close");
        

});

    function editarEmpresa(id) {
        location.href = "editar_empresa.php?id=" + id;
    }

    function eliminarEmpresa(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
            window.location.href = "eliminar_empresa.php?id=" + id;
        }
    }

    function Mostrar_usuarios(pid_empresa){
        ID_EMPRESA = pid_empresa;
        //alert(pid_empresa);
        $("#div_usuarios").dialog("open");
    }

    function asignar(pid_usuario){

        alert('funcion asignar ' +pid_usuario);
        alert('funcion asignar empresa ' +ID_EMPRESA);
    }

    function asignarUsuario(id_usuario) {
    if (confirm('¿Estás seguro de que quieres asignar este usuario a la empresa?')) {
        
    }
}

function asignarUsuario(id_usuario) {
    if (confirm('¿Estás seguro de que quieres asignar este usuario a la empresa?')) {
        $.ajax({
            type: "POST",
            url: "asignar_usuario.php",
            data: { id_empresa: ID_EMPRESA, id_usuario: id_usuario },
            success: function(response) {
                alert(response); // Mostrar mensaje de confirmación
                // Aquí puedes actualizar la interfaz si es necesario
                
            },
            error: function(xhr, status, error) {
                console.error("Error al procesar la solicitud: " + error);
            }
        });
    }
}

</script>