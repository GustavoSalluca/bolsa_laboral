<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();

$id_empresa = $_SESSION["SESION_ID_EMPRESA"];
$id_rol = $_SESSION["SESION_ROL"];
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Inicio Zona  central del sistema  -->
    <h1>Lista de Ofertas Laborales</h1>


    <?php

    if ($id_rol == 1) {
        // Si el id_rol es igual a 1, seleccionar todas las ofertas laborales
        $sql = "SELECT * FROM oferta_laboral";
    } else {
        // Si el id_rol no es igual a 1, seleccionar las ofertas laborales del id_empresa
        $sql = "SELECT * FROM oferta_laboral WHERE id_empresa = $id_empresa";
    }
    $registros = mysqli_query($conexion, $sql);


    if (!$registros) {
        // Si la consulta falla, muestra el mensaje de error de MySQL
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {
        // Si la consulta tiene éxito, procesa los resultados
        // ...
    }

    echo "<table class='table table-primary table-hover'>";

    echo "<th>Titulo</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Fecha Publicacion</th>";
    echo "<th>Fecha Cierre</th>";
    echo "<th>Remuneracion</th>";
    echo "<th>Ubicacion</th>";
    echo "<th>Tipo</th>";
    echo "<th>Limite Postulantes</th>";
    echo "<th>Acciones</th>";

    while ($fila = mysqli_fetch_array($registros)) {
        echo "<tr>";
        echo "<td>" . $fila['titulo'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['fecha_publicacion'] . "</td>";
        echo "<td>" . $fila['fecha_cierre'] . "</td>";
        echo "<td>" . $fila['remuneracion'] . "</td>";
        echo "<td>" . $fila['ubicacion'] . "</td>";
        echo "<td>" . $fila['tipo'] . "</td>";
        echo "<td>" . $fila['limite_postulantes'] . "</td>";




        echo "<td>";
    ?>
        <button type="button" class="btn btn-warning" onclick="editarOferta('<?php echo $fila['id']; ?>')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
            </svg></button>
        <button type="button" class="btn btn-danger" onclick="eliminarOferta(<?php echo $fila['id']; ?>)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
            </svg></button>
        <!-- Modifica el botón para redirigir a la página de información de postulantes -->
        <a href="informacion_postulantes.php?id_oferta=<?php echo $fila['id']; ?>" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
            </svg>
        </a>





    <?php

        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>
    

    <!-- Fin Zona  central del sistema  -->

</div>

<div id="infoPostulantes"></div>


<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>



<script>
    function editarOferta(id) {
        location.href = "editar_oferta.php?id=" + id;
    }

    function eliminarOferta(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
            window.location.href = "eliminar_oferta.php?id=" + id;
        }
    }

    // Función para administrar la oferta
    function administrarOferta(id_oferta) {
        // Realiza una solicitud AJAX al servidor
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "obtener_postulantes.php?id_oferta=" + id_oferta, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Maneja la respuesta del servidor
                document.getElementById("infoPostulantes").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }


</script>