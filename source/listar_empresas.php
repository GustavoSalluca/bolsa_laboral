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
        echo "<th>Asignacion</th>";
        echo "<th>Acciones</th>";

        while($fila = mysqli_fetch_array($registros)){
            echo "<tr>";
            echo "<td>".$fila['razon_social']."</td>";
            echo "<td>".$fila['ruc']."</td>";
            echo "<td>".$fila['correo']."</td>";
            echo "<td>".$fila['direccion']."</td>";
            echo "<td>".$fila['telefono']."</td>";
        
            $id_usuario = $fila['id_usuario'];
            $nombre_usuario = '';
            if ($id_usuario !== NULL) {
                $sql_usuario = "SELECT nombres, apellidos FROM usuarios WHERE id = $id_usuario";
                $resultado_usuario = mysqli_query($conexion, $sql_usuario);
                $fila_usuario = mysqli_fetch_array($resultado_usuario);
                $nombre_usuario = $fila_usuario['nombres'] . ' ' . $fila_usuario['apellidos'];
            }
        
            echo "<td>".$nombre_usuario."</td>";
        
            echo "<td>";
                    ?>
                    <button type="button" class="btn btn-warning"  onclick="editarEmpresa('<?php echo $fila['id']; ?>')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg> Editar</button> 
                    <button type="button" class="btn btn-danger" onclick="eliminarEmpresa(<?php echo $fila['id']; ?>)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg> Eliminar</button>


                    

                    <?php
                     if ($fila['id_usuario'] !== NULL) {
                        // Si está asignada, mostrar un mensaje o deshabilitar el botón
                        echo "<button type='button' class='btn btn-danger' onclick='quitarUsuario(".$fila['id'].")'>Quitar Usuario</button>";
                    } else {
                        // Si no está asignada, mostrar el botón para asignar usuario
                        echo "<button type='button' class='btn btn-success' onclick='Mostrar_usuarios(".$fila['id'].")'>Asignar Usuario</button>";
                    }
                    
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>

    <!-- Fin Zona  central del sistema  -->

</div>

    <div id="div_usuarios">
        
        <?php
        $sql_usuarios = "SELECT * FROM usuarios";
        $registros_usuarios = mysqli_query($conexion, $sql_usuarios);

        $html_lista_usuarios = '
        <div class="container">
            <h1>Lista de usuarios</h1>
            <div class="list-group">'; // Inicio del contenedor
        while ($fila_user = mysqli_fetch_array($registros_usuarios)) {
            $html_lista_usuarios .= '
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">';
            $html_lista_usuarios .= '<span>'.$fila_user['dni'] . ' ' . $fila_user['nombres'] . ' ' . $fila_user['apellidos'] . '</span>';
            // Verificar si el usuario está asignado a una empresa
            if ($fila_user['id_empresa'] !== NULL) {
                // Si el usuario está asignado, mostrar un mensaje en rojo
                $html_lista_usuarios .= '<span class="badge badge-danger ">Ya asignado</span>';
            } else {
                // Si el usuario no está asignado, mostrar un enlace o botón para asignarlo
                $html_lista_usuarios .= ' <a href="#" onclick="asignarUsuario('.$fila_user['id'].')" class="btn btn-primary">Asignar</a>';
            }
            $html_lista_usuarios .= '</a>';
        }
        $html_lista_usuarios .= '
            </div>
        </div>'; // Fin del contenedor
        
        // Imprimir el HTML de la lista de usuarios
        echo $html_lista_usuarios;
        
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
                // Actualizar la lista de usuarios dentro del diálogo
                $.ajax({
                    type: "GET",
                    url: "actualizar_lista_usuarios.php", // Ruta a un script que devuelve la lista actualizada de usuarios
                    success: function(data) {
                        $("#div_usuarios").html(data); // Reemplazar el contenido del div con la lista actualizada
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al obtener la lista actualizada de usuarios: " + error);
                    }
                     
                });
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error("Error al procesar la solicitud: " + error);
            }
        });
    }
}

function quitarUsuario(id_empresa) {
    if (confirm('¿Estás seguro de que quieres quitar este usuario de la empresa?')) {
        $.ajax({
            type: "POST",
            url: "quitar_usuario.php",
            data: { id_empresa: id_empresa },
            success: function(response) {
                alert(response); // Mostrar mensaje de confirmación
                // Actualizar la interfaz si es necesario
                // Por ejemplo, puedes recargar la lista de empresas
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error("Error al procesar la solicitud: " + error);
            }
        });
    }
}


</script>