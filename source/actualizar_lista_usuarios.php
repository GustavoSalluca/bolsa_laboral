<!-- <?php
// Incluir el archivo de conexión a la base de datos
include("../includes/conectar.php");

$conexion = conectar();

echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">';

// Realizar la consulta para obtener la lista actualizada de usuarios
$sql_usuarios = "SELECT * FROM usuarios";
$registros_usuarios = mysqli_query($conexion, $sql_usuarios);

// Construir el HTML para la lista de usuarios
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

?> -->

