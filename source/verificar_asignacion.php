<!-- <?php
// Incluir el archivo de conexión a la base de datos
include("../includes/conectar.php");
$conexion = conectar();

// Verificar si se recibió el ID de la empresa
if (isset($_POST['id_empresa'])) {
    // Obtener el ID de la empresa enviado desde el frontend
    $id_empresa = $_POST['id_empresa'];

    // Consultar si la empresa está asignada a un usuario
    $sql_verificar_asignacion = "SELECT id_usuario FROM empresa WHERE id = $id_empresa AND id_usuario IS NOT NULL";
    $resultado = mysqli_query($conexion, $sql_verificar_asignacion);

    // Verificar si se encontró una asignación para la empresa
    if (mysqli_num_rows($resultado) > 1) {
        // La empresa está asignada a un usuario
        echo "asignado";
    } else {
        // La empresa no está asignada a ningún usuario
        echo "no_asignado";
    }
} else {
    // No se recibió el ID de la empresa
    echo "error";
}
?> -->
